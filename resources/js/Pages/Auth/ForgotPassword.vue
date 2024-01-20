<script setup>
import { Head, useForm } from '@inertiajs/vue3'

// import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({
    status: {
        type: String,
    },
})

const form = useForm({
    email: '',
})

const submit = () => {
    form.post(route('password.email'))
}
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />

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
                <v-card-text>
                    <div class="mb-4 text-sm text-gray-600">
                        登録しているメールアドレスを入力してください。パスワード再設定用のリンクを送信します。
                    </div>
                    <div
                        v-if="status"
                        class="mb-4 font-medium text-sm text-green-600"
                    >
                        {{ status }}
                    </div>
                    <v-form @submit.prevent="submit">
                        <v-text-field
                            v-model="form.email"
                            type="email"
                            label="メールアドレス"
                            required
                            color="info"
                            variant="outlined"
                        ></v-text-field>
                        <v-row>
                            <v-spacer></v-spacer>
                            <v-col>
                                <v-btn
                                    type="submit"
                                    :disabled="form.processing"
                                    color="info"
                                >
                                    パスワードの再設定リンクを送信
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
