<script setup>
import { computed } from 'vue'
import { Head, useForm } from '@inertiajs/vue3'

// import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    status: {
        type: String,
    },
})

const form = useForm({})

const submit = () => {
    form.post(route('verification.send'))
}

const verificationLinkSent = computed(
    () => props.status === 'verification-link-sent'
)
</script>

<template>
    <GuestLayout>
        <Head title="Email Verification" />

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
                    登録ありがとうございます。メールを確認して、アカウントを有効化してください。
                </div>

                <div
                    class="mb-4 font-medium text-sm text-green-600"
                    v-if="verificationLinkSent"
                >
                    認証メールを送信しました。
                </div>

                <v-form @submit.prevent="submit">
                    <v-row>
                        <v-spacer></v-spacer>
                        <v-col cols="auto" class="pb-0">
                            <v-btn
                                type="submit"
                                :disabled="form.processing"
                                color="info"
                            >
                                認証メールの再送信
                            </v-btn>
                        </v-col>
                        <v-spacer></v-spacer>
                    </v-row>
                    <v-row>
                        <v-col cols="auto" class="pb-0">
                            <v-btn
                                :href="route('logout')"
                                prepend-icon="mdi-triangle-small-down"
                                variant="text"
                                color="primary"
                            >
                                ログアウト
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-form>
            </v-card>
        </v-sheet>
    </GuestLayout>
</template>
