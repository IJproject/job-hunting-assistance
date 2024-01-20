<script setup>
import { ref } from 'vue'
import { Head, useForm } from '@inertiajs/vue3'

// import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
})

const visible = ref(false)
const visible_confirmation = ref(false)

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
})

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    })
}
</script>

<template>
    <GuestLayout>
        <Head title="Reset Password" />

        <v-sheet
            max-width="100%"
            height="100vh"
            class="d-flex justify-center align-center"
        >
            <v-card
                class="mx-auto my-auto"
                min-width="375"
                max-width="500"
                elevation="16"
            >
                <v-form @submit.prevent="submit">
                    <v-text-field
                        v-model="form.email"
                        type="email"
                        label="メールアドレス"
                        required
                        color="info"
                        variant="outlined"
                    ></v-text-field>
                    <v-text-field
                        v-model="form.password"
                        :type="visible ? 'text' : 'password'"
                        label="パスワード"
                        required
                        color="info"
                        variant="outlined"
                        :append-inner-icon="visible ? 'mdi-eye' : 'mdi-eye-off'"
                        @click:append-inner="visible = !visible"
                    ></v-text-field>
                    <v-text-field
                        v-model="form.password_confirmation"
                        :type="visible_confirmation ? 'text' : 'password'"
                        label="パスワードの確認"
                        required
                        color="info"
                        variant="outlined"
                        :append-inner-icon="
                            visible_confirmation ? 'mdi-eye' : 'mdi-eye-off'
                        "
                        @click:append-inner="
                            visible_confirmation = !visible_confirmation
                        "
                    ></v-text-field>
                    <v-row>
                        <v-spacer></v-spacer>
                        <v-col>
                            <v-btn
                                type="submit"
                                :disabled="form.processing"
                                color="info"
                            >
                                パスワードをリセット
                            </v-btn>
                        </v-col>
                        <v-spacer></v-spacer>
                    </v-row>
                </v-form>
            </v-card>
        </v-sheet>
    </GuestLayout>
</template>
