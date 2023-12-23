<script setup lang="ts">
import { Head, Link, useForm } from "@inertiajs/vue3";

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
            <v-card class="mx-auto my-auto" max-width="400" elevation="16">
                <v-card-item>
                    <v-card-title class="text-center"> ログイン </v-card-title>
                </v-card-item>

                <v-card-text>
                    <v-form @submit.prevent="submit">
                        <v-text-field
                            v-model="form.email"
                            type="email"
                            label="メールアドレス"
                            required
                            color="primary"
                            variant="outlined"
                        ></v-text-field>

                        <v-text-field
                            v-model="form.password"
                            type="password"
                            label="パスワード"
                            required
                            color="primary"
                            variant="outlined"
                        ></v-text-field>

                        <v-checkbox
                            v-model="form.remember"
                            color="primary"
                            label="Remember me"
                        ></v-checkbox>
                        <div class="d-flex align-center">
                            <v-btn
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                variant="outlined"
                                color="primary"
                            >
                                Forgot your password?
                            </v-btn>

                            <v-spacer></v-spacer>

                            <v-btn
                                type="submit"
                                :disabled="form.processing"
                                color="primary"
                            >
                                Log in
                            </v-btn>
                        </div>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-sheet>
    </GuestLayout>
</template>
