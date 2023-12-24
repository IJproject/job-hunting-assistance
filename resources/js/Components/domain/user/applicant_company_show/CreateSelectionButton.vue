<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import FormDialog from "@/Components/common/FormDialog.vue";

import { selectionSteps } from "@/constants";
import { changeObjectForVSelect } from "@/functions";

const createSelectionForm = useForm({
    selection_step_state: null,
    date: null,
    time: null,
    interviewer: null,
    memo: null,
});
const createSelectionDialogOpen = ref(false);
const createSelection = () => {
    console.log(createSelectionForm);
};
</script>

<template>
    <v-btn
        color="primary"
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
        <template v-slot:main>
            <v-form>
                <v-select
                    label="選考ステップ"
                    v-model="createSelectionForm.selection_step_state"
                    :items="changeObjectForVSelect(selectionSteps)"
                    item-title="label"
                    item-value="id"
                    variant="outlined"
                    color="primary"
                ></v-select>
                <div class="outlined-date-picker">
                    <input type="date" v-model="createSelectionForm.date" />
                </div>
                <v-text-field
                    label="時間"
                    v-model="createSelectionForm.time"
                    variant="outlined"
                    color="primary"
                ></v-text-field>
                <v-text-field
                    label="担当者"
                    v-model="createSelectionForm.interviewer"
                    variant="outlined"
                    color="primary"
                ></v-text-field>
                <v-textarea
                    label="選考メモ"
                    v-model="createSelectionForm.memo"
                    auto-grow
                    variant="outlined"
                    rows="2"
                    color="primary"
                ></v-textarea>
            </v-form>
        </template>
        <template v-slot:actions>
            <v-btn
                @click="createSelectionDialogOpen = false"
                variant="outlined"
                color="primary"
                >キャンセル</v-btn
            >
            <v-btn @click="createSelection" variant="flat" color="primary"
                >追加</v-btn
            >
        </template>
    </FormDialog>
</template>
