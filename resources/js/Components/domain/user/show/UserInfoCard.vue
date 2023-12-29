<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import FormDialog from "@/Components/common/feedbacks/FormDialog.vue";

const props = defineProps({
    authUser: Object,
})

const updateUserForm = useForm({
    name: props.authUser.name,
    email: props.authUser.email,
    current_password: null,
    password: null,
    password_confirmation: null,
});

const updateUserDialogOpen = ref(false);

const updateUser = () => {
    updateUserForm.put(route("user.update", props.authUser.id), {
        onSuccess: () => {
            updateUserDialogOpen.value = false;
            updateUserForm.current_password = null;
            updateUserForm.password = null;
            updateUserForm.password_confirmation = null;
        },
        onError: (error) => {
            console.log(error)
        },
    })
};
</script>

<template>
    <v-card elevation="4" class="pa-4">
        <v-row>
            <v-col class="align-self-center">
                <div class="text-h6">ユーザー情報</div>
            </v-col>
            <v-col cols="auto" class="ms-auto">
                <v-btn
                    color="info"
                    variant="text"
                    icon="mdi-pencil"
                    @click="updateUserDialogOpen = true"
                >
                </v-btn>
            </v-col>
        </v-row>
        <v-sheet class="px-2 mx-2">
            <div class="text-h6">
                {{ authUser.name }}<br />
                {{ authUser.email }}
            </div>
        </v-sheet>
    </v-card>
    <FormDialog
        title="ユーザー情報の更新"
        :dialogOpen="updateUserDialogOpen"
        @update:dialogOpen="updateUserDialogOpen = $event"
    >
        <template #main>
            <v-form>
                <v-text-field
                    label="名前"
                    v-model="updateUserForm.name"
                    variant="outlined"
                    color="info"
                ></v-text-field>
                <v-text-field
                    label="メールアドレス"
                    type="email"
                    v-model="updateUserForm.email"
                    variant="outlined"
                    color="info"
                ></v-text-field>
                <v-text-field
                    label="現在のパスワード"
                    type="password"
                    v-model="updateUserForm.current_password"
                    variant="outlined"
                    color="info"
                    hint="パスワードを入力しないと更新されません。"
                    persistent-hint
                    class="mb-4"
                ></v-text-field>
                <v-text-field
                    label="新しいパスワード"
                    type="password"
                    v-model="updateUserForm.password"
                    variant="outlined"
                    color="info"
                    hint="パスワードを変更したい場合は入力してください。"
                    persistent-hint
                    class="mb-4"
                ></v-text-field>
                <v-text-field
                    label="新しいパスワードの確認"
                    type="password"
                    v-model="updateUserForm.password_confirmation"
                    variant="outlined"
                    color="info"
                ></v-text-field>
            </v-form>
        </template>
        <template #actions>
            <v-btn
                @click="updateUserDialogOpen = false"
                variant="outlined"
                color="info"
                >キャンセル</v-btn
            >
            <v-btn @click="updateUser" variant="flat" color="info"
                >更新</v-btn
            >
        </template>
    </FormDialog>
</template>