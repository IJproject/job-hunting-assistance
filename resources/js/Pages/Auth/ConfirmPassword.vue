<script setup>
import { ref } from 'vue'
import { Head, useForm } from '@inertiajs/vue3'

// import GuestLayout from '@/Layouts/GuestLayout.vue';

const form = useForm({
    password: '',
})

const visible = ref(false)

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    })
}
</script>

<template>
    <GuestLayout>
        <Head title="Confirm Password" />
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
                <div class="mb-4 text-sm text-gray-600">
                    パスワードの確認を行います。続行するにはパスワードを入力してください。
                </div>

                <v-form @submit.prevent="submit">
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

                    <v-row>
                        <v-spacer></v-spacer>
                        <v-col>
                            <v-btn
                                type="submit"
                                :disabled="form.processing"
                                color="info"
                            >
                                確認
                            </v-btn>
                        </v-col>
                        <v-spacer></v-spacer>
                    </v-row>
                </v-form>
            </v-card>
        </v-sheet>
    </GuestLayout>
</template>
