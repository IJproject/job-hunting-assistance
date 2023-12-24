<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import FormDialog from "@/Components/common/FormDialog.vue";

import { selectionSteps } from "@/constants";
import { changeObjectForVSelect } from "@/functions";

const props = defineProps({
    selections: Object,
});

const updateSelectionForm = useForm({
    selection_step_state: null,
    date: null,
    time: null,
    interviewer: null,
    memo: null,
})
const updateSelectionDialogOpen = ref(false)
const openUpdateSelectionDialog = (id: number) => {
    const isEdittingSelection = props.selections.find((selection) => selection.id === id);
    if (isEdittingSelection) {
        updateSelectionForm.selection_step_state = selectionSteps[isEdittingSelection.selection_step_state];
        updateSelectionForm.date = isEdittingSelection.date;
        updateSelectionForm.time = isEdittingSelection.time;
        updateSelectionForm.interviewer = isEdittingSelection.interviewer;
        updateSelectionForm.memo = isEdittingSelection.memo;
    }
    updateSelectionDialogOpen.value = true;
}
const updateSelection = () => {
    console.log("updateSelection");
}

const deleteSelection = (id: number) => {
    if(confirm("本当に削除しますか？")) {
        console.log(id);
    }
}
</script>

<template>
    <v-timeline side="end">
        <v-timeline-item
            v-for="selection in selections"
            :key="selection.id"
            dot-color="primary"
        >
            <v-card elevation="4" class="pa-4 pt-0">
                <v-card-item>
                    <v-card-title>
                        <v-row>
                            <v-col cols="auto" class="align-self-center">
                                <v-chip variant="flat" color="primary">{{
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
                                    color="primary"
                                    @click="openUpdateSelectionDialog(selection.id)"
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
    </v-timeline>

    <FormDialog
        title="選考状況の更新"
        :dialogOpen="updateSelectionDialogOpen"
        @update:dialogOpen="updateSelectionDialogOpen = $event"
    >
        <template v-slot:main>
            <v-form>
                <v-select
                    label="選考ステップ"
                    v-model="updateSelectionForm.selection_step_state"
                    :items="changeObjectForVSelect(selectionSteps)"
                    item-title="label"
                    item-value="id"
                    return-object
                    variant="outlined"
                    color="primary"
                ></v-select>
                <div class="outlined-date-picker">
                    <input type="date" v-model="updateSelectionForm.date" />
                </div>
                <v-text-field
                    label="時間"
                    v-model="updateSelectionForm.time"
                    variant="outlined"
                    color="primary"
                ></v-text-field>
                <v-text-field
                    label="担当者"
                    v-model="updateSelectionForm.interviewer"
                    variant="outlined"
                    color="primary"
                ></v-text-field>
                <v-textarea
                    label="選考メモ"
                    v-model="updateSelectionForm.memo"
                    auto-grow
                    variant="outlined"
                    rows="2"
                    color="primary"
                ></v-textarea>
            </v-form>
        </template>
        <template v-slot:actions>
            <v-btn
                @click="updateSelectionDialogOpen = false"
                variant="outlined"
                color="primary"
                >キャンセル</v-btn
            >
            <v-btn @click="updateSelection" variant="flat" color="primary"
                >更新</v-btn
            >
        </template>
    </FormDialog>
</template>
