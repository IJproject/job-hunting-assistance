<script setup lang="ts">
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

import FormDialog from '@/Components/common/feedbacks/FormDialog.vue'

import { aboutCompanyQuestions } from '@/constants'
import { changeObjectForVSelect, removeAlreadyExistQa } from '@/functions'

const props = defineProps({
    applicantCompanyId: Number,
    alreadyExistQaNumber: Array,
})

const qaList = removeAlreadyExistQa(
    props.alreadyExistQaNumber,
    aboutCompanyQuestions
)

console.log(props)

const createCompanyQaForm = useForm({
    applicant_company_id: props.applicantCompanyId,
    about_company_quetion_state: null,
    answer: null,
})

const createCompanyQaDialogOpen = ref(false)

const createCompanyQa = () => {
    if (
        !props.alreadyExistQaNumber.includes(
            Number(createCompanyQaForm.about_company_quetion_state)
        )
    ) {
        createCompanyQaForm.post(
            route('user.applicant_company.company_qa.store'),
            {
                onSuccess: () => {
                    createCompanyQaDialogOpen.value = false
                    createCompanyQaForm.reset()
                },
                onError: (error) => {
                    console.log(error)
                },
            }
        )
    }
}
</script>

<template>
    <v-btn
        color="info"
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
                    :items="changeObjectForVSelect(qaList)"
                    item-title="label"
                    item-value="id"
                    variant="outlined"
                    color="info"
                ></v-select>
                <v-textarea
                    label="回答"
                    v-model="createCompanyQaForm.answer"
                    auto-grow
                    variant="outlined"
                    rows="2"
                    color="info"
                ></v-textarea>
            </v-form>
        </template>
        <template v-slot:actions>
            <v-btn
                @click="createCompanyQaDialogOpen = false"
                variant="outlined"
                color="info"
                >キャンセル</v-btn
            >
            <v-btn @click="createCompanyQa" variant="flat" color="info"
                >追加</v-btn
            >
        </template>
    </FormDialog>
</template>
