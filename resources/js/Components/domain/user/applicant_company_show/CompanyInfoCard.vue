<script setup lang="ts">
import { ref } from "vue";
import { Link, useForm } from "@inertiajs/vue3";

import FormDialog from "@/Components/common/feedbacks/FormDialog.vue";

import { industries, jobs, selectionStatuses, selectionStatusColors } from "@/constants";
import { changeObjectForVSelect, getKeyByValue } from "@/functions";

const props = defineProps({
    applicantCompany: Object,
});

const updateCompanyDialogOpen = ref(false);

// 会社情報の更新(変更がない項目は文字列情報が入っている)
const updateCompanyForm = useForm({
    selection_status_state: selectionStatuses[props.applicantCompany.selection_status_state],
    industry_state: industries[props.applicantCompany.industry_state],
    job_state: jobs[props.applicantCompany.job_state],
    salary: props.applicantCompany.salary,
    memo: props.applicantCompany.memo,
});

const deleteCompanyForm = useForm({
    id: props.applicantCompany.id,
})

const updateCompany = () => {
    updateCompanyForm.put(route('user.applicant_company.update', props.applicantCompany.id),  {
        onSuccess: () => {
            console.log('success')
            updateCompanyDialogOpen.value = false;
        },
        onError: () => {
            console.log('error');
        },
    })
};

const deleteCompany = () => {
    if(confirm("本当に削除しますか？")) {
        deleteCompanyForm.delete(route('user.applicant_company.destroy'));
    }
};
</script>

<template>
    <v-card elevation="4">
        <v-card-item>
            <v-card-title>
                <v-row>
                    <v-col class="align-self-center">
                        <div class="text-h6">会社情報</div>
                    </v-col>
                    <v-col cols="auto" class="px-0">
                        <v-btn
                            variant="text"
                            icon="mdi-pencil"
                            color="info"
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
                <v-row>
                    <v-col cols="auto" class="pt-0">
                        <div>{{ applicantCompany.company.name }}</div>
                    </v-col>
                    <v-col cols="auto" class="me-auto pt-0">
                        <v-chip variant="tonal" :color="selectionStatusColors[applicantCompany.selection_status_state]">
                            {{
                                selectionStatuses[
                                    applicantCompany.selection_status_state
                                ]
                            }}
                        </v-chip>
                    </v-col>
                </v-row>
            </v-card-title>
            <v-card-subtitle class="mt-2">
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
        <template #main>
            <v-form>
                <v-select
                    label="選考状況"
                    v-model="updateCompanyForm.selection_status_state"
                    :items="changeObjectForVSelect(selectionStatuses)"
                    item-title="label"
                    item-value="id"
                    variant="outlined"
                    color="info"
                ></v-select>
                <v-select
                    label="業種"
                    v-model="updateCompanyForm.industry_state"
                    :items="changeObjectForVSelect(industries)"
                    item-title="label"
                    item-value="id"
                    variant="outlined"
                    color="info"
                ></v-select>
                <v-select
                    label="職種"
                    v-model="updateCompanyForm.job_state"
                    :items="changeObjectForVSelect(jobs)"
                    item-title="label"
                    item-value="id"
                    variant="outlined"
                    color="info"
                ></v-select>
                <v-text-field
                    label="給与"
                    v-model="updateCompanyForm.salary"
                    variant="outlined"
                    color="info"
                ></v-text-field>
                <v-textarea
                    label="企業メモ"
                    v-model="updateCompanyForm.memo"
                    auto-grow
                    variant="outlined"
                    rows="2"
                    color="info"
                ></v-textarea>
            </v-form>
        </template>
        <template #actions>
            <v-btn
                @click="updateCompanyDialogOpen = false"
                variant="outlined"
                color="info"
                >キャンセル</v-btn
            >
            <v-btn @click="updateCompany" variant="flat" color="info"
                >更新</v-btn
            >
        </template>
    </FormDialog>
</template>
