<script setup lang="ts">
import { ref } from "vue";
import { Link, useForm } from "@inertiajs/vue3";

import FormDialog from "@/Components/common/FormDialog.vue";

import { industries, jobs, selectionStatuses } from "@/constants";
import { changeObjectForVSelect } from "@/functions";

const props = defineProps({
    applicantCompany: Object,
});

// 会社情報の更新(変更がない項目は文字列情報が入っている)
const updateCompanyForm = useForm({
    selection_status_state: selectionStatuses[props.applicantCompany.selection_status_state],
    industry_state: industries[props.applicantCompany.industry_state],
    job_state: jobs[props.applicantCompany.job_state],
    salary: props.applicantCompany.salary,
    memo: props.applicantCompany.memo,
});
const updateCompanyDialogOpen = ref(false);
const updateCompany = () => {
    console.log(updateCompanyForm.selection_status_state);
};

const deleteCompany = () => {
    if(confirm("本当に削除しますか？")) {
        console.log("削除");
    }
};
</script>

<template>
    <v-card elevation="4">
        <v-card-item>
            <v-card-title>
                <v-row>
                    <v-col cols="auto">
                        <h3 class="text-h5">
                            {{ applicantCompany.company.name }}
                        </h3>
                    </v-col>
                    <v-col cols="auto">
                        <v-chip variant="flat" color="primary">
                            {{
                                selectionStatuses[
                                    applicantCompany.selection_status_state
                                ]
                            }}
                        </v-chip>
                    </v-col>
                    <v-spacer></v-spacer>
                    <v-col cols="auto" class="px-0">
                        <v-btn
                            variant="text"
                            icon="mdi-pencil"
                            color="primary"
                            @click="updateCompanyDialogOpen = true"
                        >
                        </v-btn>
                    </v-col>
                    <v-col cols="auto" class="pl-0">
                        <v-btn
                            variant="text"
                            icon="mdi-delete"
                            color="error"
                            @click="deleteCompany"
                        >
                        </v-btn>
                    </v-col>
                </v-row>
            </v-card-title>
            <v-card-subtitle>
                <a
                    :href="applicantCompany.company.hp_url"
                    class="text-primary text-decoration-underline"
                >
                    {{ applicantCompany.company.hp_url }} </a
                ><br />
                {{ industries[applicantCompany.industry_state] }},
                {{ jobs[applicantCompany.job_state] }},
                {{ applicantCompany.salary }}
            </v-card-subtitle>
        </v-card-item>
        <v-card-text>
            {{ applicantCompany.memo }}
        </v-card-text>
    </v-card>

    <FormDialog
        title="会社情報の更新"
        :dialogOpen="updateCompanyDialogOpen"
        @update:dialogOpen="updateCompanyDialogOpen = $event"
    >
        <template v-slot:main>
            <v-form>
                <v-select
                    label="選考状況"
                    v-model="updateCompanyForm.selection_status_state"
                    :items="changeObjectForVSelect(selectionStatuses)"
                    item-title="label"
                    item-value="id"
                    variant="outlined"
                    color="primary"
                ></v-select>
                <v-select
                    label="業種"
                    v-model="updateCompanyForm.industry_state"
                    :items="changeObjectForVSelect(industries)"
                    item-title="label"
                    item-value="id"
                    return-object
                    variant="outlined"
                    color="primary"
                ></v-select>
                <v-select
                    label="職種"
                    v-model="updateCompanyForm.job_state"
                    :items="changeObjectForVSelect(jobs)"
                    item-title="label"
                    item-value="id"
                    return-object
                    variant="outlined"
                    color="primary"
                ></v-select>
                <v-text-field
                    label="給与"
                    v-model="updateCompanyForm.salary"
                    variant="outlined"
                    color="primary"
                ></v-text-field>
                <v-textarea
                    label="企業メモ"
                    v-model="updateCompanyForm.memo"
                    auto-grow
                    variant="outlined"
                    rows="2"
                    color="primary"
                ></v-textarea>
            </v-form>
        </template>
        <template v-slot:actions>
            <v-btn
                @click="updateCompanyDialogOpen = false"
                variant="outlined"
                color="primary"
                >キャンセル</v-btn
            >
            <v-btn @click="updateCompany" variant="flat" color="primary"
                >更新</v-btn
            >
        </template>
    </FormDialog>
</template>
