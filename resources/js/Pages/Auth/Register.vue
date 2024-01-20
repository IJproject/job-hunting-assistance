<script setup>
import { ref } from 'vue'
import { Head, useForm } from '@inertiajs/vue3'

// import GuestLayout from '@/Layouts/GuestLayout.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})

const visible = ref(false)
const visible_confirmation = ref(false)

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    })
}
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

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
                <v-card-item class="mt-2 mb-4">
                    <v-card-title class="text-center text-h5">
                        新規登録
                    </v-card-title>
                </v-card-item>

                <v-card-text>
                    <v-form @submit.prevent="submit">
                        <v-text-field
                            v-model="form.name"
                            type="text"
                            label="氏名"
                            required
                            color="info"
                            variant="outlined"
                        ></v-text-field>

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
                            :append-inner-icon="
                                visible ? 'mdi-eye' : 'mdi-eye-off'
                            "
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
                                    新規登録
                                </v-btn>
                            </v-col>
                            <v-spacer></v-spacer>
                        </v-row>
                        <v-row>
                            <v-col cols="auto">
                                <v-btn
                                    :href="route('login')"
                                    prepend-icon="mdi-triangle-small-down"
                                    variant="text"
                                    color="primary"
                                >
                                    ログインはこちら
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-sheet>
    </GuestLayout>
</template>
