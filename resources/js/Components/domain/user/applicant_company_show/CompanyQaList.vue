<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import QuestionAndAnswerWrapper from "@/Components/common/QuestionAndAnswerWrapper.vue";
import FormDialog from "@/Components/common/FormDialog.vue";

import { aboutCompanyQuestions } from "@/constants";

const props = defineProps({
    companyQas: Array,
})

const updateCompanyQaForm = useForm({
    id: null,
    answer: null,
})
const updateCompanyQaDialogOpen = ref(false);
const isEdittingQa = ref(null)
const openUpdateCompanyQaDialog = (id) => {
    isEdittingQa.value = props.companyQas.find((qa) => qa.id === id);
    if(isEdittingQa.value) {
        updateCompanyQaForm.id = isEdittingQa.value.id;
        updateCompanyQaForm.answer = isEdittingQa.value.answer;
    }
    updateCompanyQaDialogOpen.value = true
}
const updateCompanyQa = () => {
    
}

const deleteCompanyQa = (id) => {
    if(confirm("本当に削除しますか？")) {
        console.log("削除");
    }
}
</script>

<template>
    <template 
        v-for="qa in companyQas"
        :key="qa.id"
    >
        <QuestionAndAnswerWrapper>
            <template v-slot:question>
                
                <v-row>
                    <v-col cols="auto" class="align-self-center">
                        {{ aboutCompanyQuestions[qa.about_company_quetion_state] }}
                    </v-col>
                    <v-spacer></v-spacer>
                    <v-col cols="auto" class="px-0">
                        <v-btn
                            variant="text"
                            icon="mdi-pencil"
                            color="primary"
                            size="small"
                            @click="openUpdateCompanyQaDialog(qa.id)"
                        >
                        </v-btn>
                    </v-col>
                    <v-col cols="auto" class="pl-0">
                        <v-btn
                            variant="text"
                            icon="mdi-delete"
                            color="error"
                            size="small"
                            @click="deleteCompanyQa(qa.id)"
                        >
                        </v-btn>
                    </v-col>
                </v-row>
                
            </template>
            <template v-slot:answer>
                <v-row class="py-2">
                    <v-col cols="auto" class="align-self-center">
                        {{ qa.answer }}
                    </v-col>
                </v-row>
            </template>
        </QuestionAndAnswerWrapper>
    </template>
    <FormDialog
        title="回答の更新"
        :dialogOpen="updateCompanyQaDialogOpen"
        @update:dialogOpen="updateCompanyQaDialogOpen = $event"
    >
        <template v-slot:main>
            <v-form>
                <v-row>
                    <v-col cols="auto" class="align-self-center mb-3">
                        {{ aboutCompanyQuestions[isEdittingQa.about_company_quetion_state] }}
                    </v-col>
                </v-row>
                
                <v-textarea
                    label="回答"
                    v-model="updateCompanyQaForm.answer"
                    auto-grow
                    variant="outlined"
                    rows="2"
                    color="primary"
                ></v-textarea>
            </v-form>
        </template>
        <template v-slot:actions>
            <v-btn
                @click="updateCompanyQaDialogOpen = false"
                variant="outlined"
                color="primary"
                >キャンセル</v-btn
            >
            <v-btn @click="updateCompanyQa" variant="flat" color="primary"
                >更新</v-btn
            >
        </template>
    </FormDialog>
</template>