<script setup lang="ts">
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

import FormDialog from '@/Components/common/feedbacks/FormDialog.vue'

import { selectionSteps } from '@/constants'
import { changeObjectForVSelect } from '@/functions'

const props = defineProps({
    applicantCompanyId: Number,
})

const createSelectionForm = useForm({
    applicant_company_id: props.applicantCompanyId,
    selection_step_state: null,
    date: null,
    time: null,
    interviewer: null,
    memo: null,
})
const createSelectionDialogOpen = ref(false)
const createSelection = () => {
    createSelectionForm.selection_step_state = Number(
        createSelectionForm.selection_step_state
    )
    createSelectionForm.post(route('user.applicant_company.selection.store'), {
        onSuccess: () => {
            createSelectionDialogOpen.value = false
            createSelectionForm.reset()
        },
        onError: (error) => {
            console.log(error)
        },
    })
}
</script>

<template>
    <v-btn
        color="info"
        variant="flat"
        @click="createSelectionDialogOpen = true"
    >
        追加
    </v-btn>
    <FormDialog
        title="選考状況の追加"
        :dialogOpen="createSelectionDialogOpen"
        @update:dialogOpen="createSelectionDialogOpen = $event"
    >
        <template #main>
            <v-form>
                <v-select
                    label="選考ステップ"
                    v-model="createSelectionForm.selection_step_state"
                    :items="changeObjectForVSelect(selectionSteps)"
                    item-title="label"
                    item-value="id"
                    variant="outlined"
                    color="info"
                ></v-select>
                <div class="outlined-date-picker">
                    <input type="date" v-model="createSelectionForm.date" />
                </div>
                <v-text-field
                    label="時間"
                    v-model="createSelectionForm.time"
                    variant="outlined"
                    color="info"
                ></v-text-field>
                <v-text-field
                    label="担当者"
                    v-model="createSelectionForm.interviewer"
                    variant="outlined"
                    color="info"
                ></v-text-field>
                <v-textarea
                    label="選考メモ"
                    v-model="createSelectionForm.memo"
                    auto-grow
                    variant="outlined"
                    rows="2"
                    color="info"
                ></v-textarea>
            </v-form>
        </template>
        <template #actions>
            <v-btn
                @click="createSelectionDialogOpen = false"
                variant="outlined"
                color="info"
                >キャンセル</v-btn
            >
            <v-btn @click="createSelection" variant="flat" color="info"
                >追加</v-btn
            >
        </template>
    </FormDialog>
</template>
