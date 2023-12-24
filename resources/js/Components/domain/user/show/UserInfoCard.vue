<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import FormDialog from "@/Components/common/FormDialog.vue";

const props = defineProps({
    authUser: Object,
})

const updateUserForm = useForm({
    name: props.authUser.name,
    email: props.authUser.email,
    current_password: null,
    new_password: null,
    new_password_confirmation: null,
});
const updateUserDialogOpen = ref(false);
const updateUser = () => {
    console.log(updateUserForm);
};
</script>

<template>
    <v-card elevation="4" class="pa-4">
        <v-row>
            <v-col cols="auto" class="align-self-center">
                <v-sheet class="px-2 mx-2">
                    ここに
                </v-sheet>
            </v-col>
            <v-col cols="auto" class="me-auto align-self-center">
                <v-sheet class="px-2 mx-2">
                    <div class="text-h6">
                        {{ authUser.name }}<br />
                        {{ authUser.email }}
                    </div>
                </v-sheet>
            </v-col>
            <v-col cols="auto" class="align-self-center">
                <v-btn
                    color="primary"
                    variant="text"
                    icon="mdi-pencil"
                    @click="updateUserDialogOpen = true"
                >
                </v-btn>
            </v-col>
        </v-row>
    </v-card>
    <FormDialog
        title="ユーザー情報の更新"
        :dialogOpen="updateUserDialogOpen"
        @update:dialogOpen="updateUserDialogOpen = $event"
    >
        <template v-slot:main>
            <v-form>
                <v-text-field
                    label="名前"
                    v-model="updateUserForm.name"
                    variant="outlined"
                    color="primary"
                ></v-text-field>
                <v-text-field
                    label="メールアドレス"
                    type="email"
                    v-model="updateUserForm.email"
                    variant="outlined"
                    color="primary"
                ></v-text-field>
                <v-text-field
                    label="現在のパスワード"
                    type="password"
                    v-model="updateUserForm.current_password"
                    variant="outlined"
                    color="primary"
                    hint="パスワードを入力しないと更新されません。"
                    persistent-hint
                    class="mb-4"
                ></v-text-field>
                <v-text-field
                    label="新しいパスワード"
                    type="password"
                    v-model="updateUserForm.new_password"
                    variant="outlined"
                    color="primary"
                    hint="パスワードを変更したい場合は入力してください。"
                    persistent-hint
                    class="mb-4"
                ></v-text-field>
                <v-text-field
                    label="新しいパスワードの確認"
                    type="password"
                    v-model="updateUserForm.new_password_confirmation"
                    variant="outlined"
                    color="primary"
                ></v-text-field>
            </v-form>
        </template>
        <template v-slot:actions>
            <v-btn
                @click="updateUserDialogOpen = false"
                variant="outlined"
                color="primary"
                >キャンセル</v-btn
            >
            <v-btn @click="updateUser" variant="flat" color="primary"
                >更新</v-btn
            >
        </template>
    </FormDialog>
</template>