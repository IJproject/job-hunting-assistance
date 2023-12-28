<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import QuestionAndAnswerWrapper from "@/Components/common/surfaces/QuestionAndAnswerWrapper.vue";
import FormDialog from "@/Components/common/feedbacks/FormDialog.vue";

import { aboutCompanyQuestions } from "@/constants";

const props = defineProps({
    companyQa: Object,
})

const updateCompanyQaForm = useForm({
    id: props.companyQa.id,
    applicant_company_id: props.companyQa.applicant_company_id,
    about_company_quetion_state: props.companyQa.about_company_quetion_state,
    answer: props.companyQa.answer,
})

const deleteCompanyQaForm = useForm({
    id: props.companyQa.id,
    applicant_company_id: props.companyQa.applicant_company_id,
})

const updateCompanyQaDialogOpen = ref(false);

const updateCompanyQa = () => {
    updateCompanyQaForm.post(route('user.applicant_company.company_qa.store'), {
        onSuccess: () => {
            updateCompanyQaDialogOpen.value = false;
        },
        onError: () => {
            console.log('error');
        }
    })
}

const deleteCompanyQa = () => {
    if(confirm("本当に削除しますか？")) {
        deleteCompanyQaForm.delete(route('user.applicant_company.company_qa.destroy'));
    }
}
</script>

<template>
    <QuestionAndAnswerWrapper>
        <template v-slot:question>
            
            <v-row>
                <v-col cols="auto" class="align-self-center">
                    {{ aboutCompanyQuestions[props.companyQa.about_company_quetion_state] }}
                </v-col>
                <v-spacer></v-spacer>
                <v-col cols="auto" class="px-0">
                    <v-btn
                        variant="text"
                        icon="mdi-pencil"
                        color="primary"
                        size="small"
                        @click="updateCompanyQaDialogOpen = true"
                    >
                    </v-btn>
                </v-col>
                <v-col cols="auto" class="pl-0">
                    <v-btn
                        variant="text"
                        icon="mdi-delete"
                        color="error"
                        size="small"
                        @click="deleteCompanyQa"
                    >
                    </v-btn>
                </v-col>
            </v-row>
            
        </template>
        <template v-slot:answer>
            <v-row class="py-2">
                <v-col cols="auto" class="align-self-center">
                    {{ props.companyQa.answer }}
                </v-col>
            </v-row>
        </template>
    </QuestionAndAnswerWrapper>
    <FormDialog
        title="回答の更新"
        :dialogOpen="updateCompanyQaDialogOpen"
        @update:dialogOpen="updateCompanyQaDialogOpen = $event"
    >
        <template v-slot:main>
            <v-form>
                <v-row>
                    <v-col cols="auto" class="align-self-center mb-3">
                        {{ aboutCompanyQuestions[props.companyQa.about_company_quetion_state] }}
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