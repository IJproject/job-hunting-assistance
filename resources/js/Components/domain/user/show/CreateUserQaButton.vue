<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import FormDialog from "@/Components/common/FormDialog.vue";

import { aboutUserQuestions } from "@/constants";
import { changeObjectForVSelect } from "@/functions";

const createUserQaForm = useForm({
    about_user_quetion_state: null,
    answer: null,
});
const createUserQaDialogOpen = ref(false);
const createUserQa = () => {
    console.log(createUserQaForm);
};
</script>

<template>
    <v-btn
        color="primary"
        variant="flat"
        @click="createUserQaDialogOpen = true"
    >
        追加
    </v-btn>
    <FormDialog
        title="分析の追加"
        :dialogOpen="createUserQaDialogOpen"
        @update:dialogOpen="createUserQaDialogOpen = $event"
    >
        <template v-slot:main>
            <v-form>
                <v-select
                    label="質問"
                    v-model="createUserQaForm.about_user_quetion_state"
                    :items="changeObjectForVSelect(aboutUserQuestions)"
                    item-title="label"
                    item-value="id"
                    variant="outlined"
                    color="primary"
                ></v-select>
                <v-textarea
                    label="回答"
                    v-model="createUserQaForm.answer"
                    auto-grow
                    variant="outlined"
                    rows="2"
                    color="primary"
                ></v-textarea>
            </v-form>
        </template>
        <template v-slot:actions>
            <v-btn
                @click="createUserQaDialogOpen = false"
                variant="outlined"
                color="primary"
                >キャンセル</v-btn
            >
            <v-btn @click="createUserQa" variant="flat" color="primary"
                >追加</v-btn
            >
        </template>
    </FormDialog>
</template>
