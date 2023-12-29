<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import FormDialog from "@/Components/common/feedbacks/FormDialog.vue";

import { selectionSteps, selectionStepColors } from "@/constants";
import { changeObjectForVSelect, getKeyByValue } from "@/functions";

const props = defineProps({
    selection: Object,
    applicantCompanyId: Number
});

const updateSelectionForm = useForm({
    id: props.selection.id,
    applicant_company_id: props.applicantCompanyId,
    selection_step_state: selectionSteps[props.selection.selection_step_state],
    date: props.selection.date,
    time: props.selection.time,
    interviewer: props.selection.interviewer,
    memo: props.selection.memo,
})

const deleteSelectionForm = useForm({
    id: props.selection.id,
    applicant_company_id: props.applicantCompanyId,
})

const updateSelectionDialogOpen = ref(false)
    
const updateSelection = () => {
    updateSelectionForm.selection_step_state = getKeyByValue(selectionSteps, updateSelectionForm.selection_step_state)
    updateSelectionForm.post(route('user.applicant_company.selection.store'), {
        onSuccess: () => {
            updateSelectionDialogOpen.value = false;
        },
        onError: (error) => {
            console.log(error);
        }
    })
}

const deleteSelection = () => {
    if(confirm("本当に削除しますか？")) {
        deleteSelectionForm.delete(route('user.applicant_company.selection.destroy'))
    }
}
</script>

<template>
    <v-timeline-item
        :dot-color="selectionStepColors[selection.selection_step_state]"
    >     
        <v-card elevation="4" class="pa-4 pt-0">
            <v-card-item>
                <v-card-title>
                    <v-row row>
                        <v-col cols="auto" class="align-self-center">
                            <v-chip variant="tonal" :color="selectionStepColors[selection.selection_step_state]">{{
                                selectionSteps[
                                    selection.selection_step_state
                                ]
                            }}</v-chip>
                        </v-col>
                        <v-spacer></v-spacer>
                        <v-col cols="auto" class="px-0">
                            <v-btn
                                variant="text"
                                icon="mdi-pencil"
                                color="info"
                                @click="updateSelectionDialogOpen = true"
                            >
                            </v-btn>
                        </v-col>
                        <v-col cols="auto" class="pl-0">
                            <v-btn
                                variant="text"
                                icon="mdi-delete"
                                color="error"
                                @click="deleteSelection(selection.id)"
                            >
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card-title>
                <v-card-subtitle class="mt-2">
                    日付：{{ selection.date }}、時間：{{
                        selection.time
                    }}、担当者：{{ selection.interviewer }}
                </v-card-subtitle>
            </v-card-item>

            <v-card-text>
                {{ selection.memo }}
            </v-card-text>
        </v-card>
    </v-timeline-item>

    <FormDialog
        title="選考状況の更新"
        :dialogOpen="updateSelectionDialogOpen"
        @update:dialogOpen="updateSelectionDialogOpen = $event"
    >
        <template #main>
            <v-form>
                <v-select
                    label="選考ステップ"
                    v-model="updateSelectionForm.selection_step_state"
                    :items="changeObjectForVSelect(selectionSteps)"
                    item-title="label"
                    item-value="id"
                    variant="outlined"
                    color="info"
                ></v-select>
                <div class="outlined-date-picker">
                    <input type="date" v-model="updateSelectionForm.date" />
                </div>
                <v-text-field
                    label="時間"
                    v-model="updateSelectionForm.time"
                    variant="outlined"
                    color="info"
                ></v-text-field>
                <v-text-field
                    label="担当者"
                    v-model="updateSelectionForm.interviewer"
                    variant="outlined"
                    color="info"
                ></v-text-field>
                <v-textarea
                    label="選考メモ"
                    v-model="updateSelectionForm.memo"
                    auto-grow
                    variant="outlined"
                    rows="2"
                    color="info"
                ></v-textarea>
            </v-form>
        </template>
        <template #actions>
            <v-btn
                @click="updateSelectionDialogOpen = false"
                variant="outlined"
                color="info"
                >キャンセル</v-btn
            >
            <v-btn @click="updateSelection" variant="flat" color="info"
                >更新</v-btn
            >
        </template>
    </FormDialog>
</template>
