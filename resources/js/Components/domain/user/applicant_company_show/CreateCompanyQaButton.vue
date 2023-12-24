<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import FormDialog from "@/Components/common/FormDialog.vue";

import { aboutCompanyQuestions } from "@/constants";
import { changeObjectForVSelect } from "@/functions";

const createCompanyQaForm = useForm({
    about_company_quetion_state: null,
    answer: null,
});
const createCompanyQaDialogOpen = ref(false);
const createCompanyQa = () => {
    console.log(createCompanyQaForm);
};
</script>

<template>
    <v-btn
        color="primary"
        variant="flat"
        @click="createCompanyQaDialogOpen = true"
    >
        追加
    </v-btn>
    <FormDialog
        title="分析の追加"
        :dialogOpen="createCompanyQaDialogOpen"
        @update:dialogOpen="createCompanyQaDialogOpen = $event"
    >
        <template v-slot:main>
            <v-form>
                <v-select
                    label="質問"
                    v-model="createCompanyQaForm.about_company_quetion_state"
                    :items="changeObjectForVSelect(aboutCompanyQuestions)"
                    item-title="label"
                    item-value="id"
                    variant="outlined"
                    color="primary"
                ></v-select>
                <v-textarea
                    label="回答"
                    v-model="createCompanyQaForm.answer"
                    auto-grow
                    variant="outlined"
                    rows="2"
                    color="primary"
                ></v-textarea>
            </v-form>
        </template>
        <template v-slot:actions>
            <v-btn
                @click="createCompanyQaDialogOpen = false"
                variant="outlined"
                color="primary"
                >キャンセル</v-btn
            >
            <v-btn @click="createCompanyQa" variant="flat" color="primary"
                >追加</v-btn
            >
        </template>
    </FormDialog>
</template>
