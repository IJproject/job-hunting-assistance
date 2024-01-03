<script setup lang="ts">
import { ref } from "vue";
import { Head, useForm } from "@inertiajs/vue3";

// import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const visible = ref(false);

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <v-sheet max-width="100%" height="100vh" class="d-flex justify-center align-center">
            <v-card class="mx-auto my-auto" min-width="375" max-width="500" elevation="16">
                <v-card-item class="mt-2 mb-4">
                    <v-card-title class="text-center text-h5"> ログイン </v-card-title>
                </v-card-item>

                <v-card-text>
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
                        <!-- <v-checkbox
                            v-model="form.remember"
                            color="info"
                            label="Remember me"
                        ></v-checkbox> -->
                        <v-row>
                            <v-spacer></v-spacer>
                            <v-col>
                                <v-btn
                                    type="submit"
                                    :disabled="form.processing"
                                    color="info"
                                >
                                    ログイン
                                </v-btn>
                            </v-col>
                            <v-spacer></v-spacer>
                        </v-row>
                        <v-row>
                            <v-col cols="auto" class="pb-0">
                                <v-btn
                                    v-if="canResetPassword"
                                    :href="route('password.request')"
                                    prepend-icon="mdi-triangle-small-down"
                                    variant="text"
                                    color="primary"
                                >
                                    パスワードを忘れたら
                                </v-btn>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="auto" class="pt-0">
                                <v-btn
                                    v-if="canResetPassword"
                                    :href="route('register')"
                                    prepend-icon="mdi-triangle-small-down"
                                    variant="text"
                                    color="primary"
                                >
                                    新規登録はこちら
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-sheet>
    </GuestLayout>
</template>
