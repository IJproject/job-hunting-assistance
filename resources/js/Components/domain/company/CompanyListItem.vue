<script setup lang="ts">
import { ref, watch } from "vue";
import { useForm } from "@inertiajs/vue3";

import FormDialog from "@/Components/common/feedbacks/FormDialog.vue";
import SnackBar from "@/Components/common/feedbacks/SnackBar.vue";

const props = defineProps({
    company: Object,
});
const validationErrors = ref({});

const updateCompanyForm = useForm({
    id: props.company.id,
    corporation_number: props.company.corporation_number,
    name: props.company.name,
    hp_url: props.company.hp_url,
    location: props.company.location,
    state: 'update_company',
});

const newApplicantCompanyForm = useForm({
    company_id: props.company.id,
    state: 'make_applicant_company'
});

const updateCompanyDialogOpen = ref(false);

const updateCompany = () => {
    updateCompanyForm.post(route("company.store"), {
        onSuccess: () => {
            updateCompanyDialogOpen.value = false;
            isSnackbar.value = true;
        },
        onError: (error) => {
            if (error) {
                validationErrors.value = { ...error };
            }
        },
    });
};

const isSnackbar = ref(false);

watch(isSnackbar, (newVal) => {
    console.log("newval", newVal)
});

const actionItems = [
    {
        id: 1,
        label: "選考中企業に追加",
        function: () => {
            if(confirm("本当に追加しますか？")) {
                newApplicantCompanyForm.post(route("company.store"))
            }
        },
    },
    {
        id: 2,
        label: "企業情報の編集",
        function: () => {
            updateCompanyDialogOpen.value = true;
        },
    },
];
</script>

<template>
    <v-col cols="12" md="6" lg="4">
        <v-card elevation="4">
            <v-card-text class="pt-2 pb-6">
                <v-row>
                    <v-col cols="auto" class="text-h5 align-self-center">
                        {{ company.name }}
                    </v-col>
                    <v-spacer></v-spacer>
                    <v-col cols="auto">
                        <!-- <v-btn
                            color="primary"
                            icon="mdi-pencil"
                            variant="text"
                            @click="updateCompanyDialogOpen = true"
                        >
                        </v-btn> -->
                        <v-menu>
                            <template v-slot:activator="{ props }">
                                <v-btn
                                    variant="text"
                                    icon="mdi-dots-vertical"
                                    v-bind="props"
                                ></v-btn>
                            </template>

                            <v-list>
                                <v-list-item
                                    v-for="item in actionItems"
                                    :key="item.id"
                                    @click="item.function"
                                >
                                    <v-list-item-title>{{
                                        item.label
                                    }}</v-list-item-title>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="auto" class="py-0 me-auto">
                        <a :href="company.hp_url">{{ company.hp_url }}</a>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>
    </v-col>

    <FormDialog
        title="選考状況の更新"
        :dialogOpen="updateCompanyDialogOpen"
        @update:dialogOpen="updateCompanyDialogOpen = $event"
    >
        <template v-slot:main>
            <v-form>
                <v-sheet class="mb-6">
                    <v-row>
                        <v-col cols="12">
                            <v-alert
                                type="info"
                                elevation="2"
                                icon="mdi-information"
                            >
                                登録企業の情報は、国税庁法人番号公表サイトから取得し、正式なものを登録するようにしてください。
                                <a href="https://www.houjin-bangou.nta.go.jp/" target="_blank">https://www.houjin-bangou.nta.go.jp/</a>
                            </v-alert>
                        </v-col>
                    </v-row>
                </v-sheet>
                <v-text-field
                    label="企業名"
                    v-model="updateCompanyForm.name"
                    :error-messages="validationErrors.name"
                    variant="outlined"
                    color="primary"
                ></v-text-field>
                <v-text-field
                    label="法人番号"
                    v-model="updateCompanyForm.corporation_number"
                    :error-messages="validationErrors.corporation_number"
                    variant="outlined"
                    color="primary"
                    required
                ></v-text-field>
                <v-text-field
                    label="ホームページURL"
                    v-model="updateCompanyForm.hp_url"
                    :error-messages="validationErrors.hp_url"
                    variant="outlined"
                    color="primary"
                ></v-text-field>
                <v-text-field
                    label="所在地"
                    v-model="updateCompanyForm.location"
                    :error-messages="validationErrors.location"
                    variant="outlined"
                    color="primary"
                ></v-text-field>
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
    <SnackBar
        :isSnackbar="isSnackbar"
        @update:isSnackbar="isSnackbar = $event"
    />
</template>
