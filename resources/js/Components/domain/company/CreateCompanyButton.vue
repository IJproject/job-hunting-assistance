<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import FormDialog from "@/Components/common/feedbacks/FormDialog.vue";
import SnackBar from '@/Components/common/feedbacks/SnackBar.vue';

const createCompanyForm = useForm({
    name: null,
    corporation_number: null,
    hp_url: null,
    location: null,
});
const validationErrors = ref({})

// 新規作成処理
const createCompanyDialogOpen = ref(false);
const createCompany = () => {
    createCompanyForm.post(route("company.store"), {
        onSuccess: () => { 
            createCompanyDialogOpen.value = false
            createCompanyForm.reset();
        },
        onError: (error) => { 
            if(error) {
                validationErrors.value = { ... error }
            }
        },
    });
};

const isSnackbar = ref(false)
</script>

<template>
    <v-btn
        color="info"
        variant="flat"
        @click="createCompanyDialogOpen = true"
    >
        企業登録
    </v-btn>
    <FormDialog
        title="企業の追加"
        :dialogOpen="createCompanyDialogOpen"
        @update:dialogOpen="createCompanyDialogOpen = $event"
    >
        <template #main>
            <v-form>
                <v-sheet class="mb-6">
                    <v-row>
                        <v-col cols="12">
                            <v-alert
                                type="warning"
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
                    v-model="createCompanyForm.name"
                    :error-messages="validationErrors.name"
                    variant="outlined"
                    color="info"
                    required
                ></v-text-field>
                <v-text-field
                    label="法人番号"
                    v-model="createCompanyForm.corporation_number"
                    :error-messages="validationErrors.corporation_number"
                    variant="outlined"
                    color="info"
                    required
                ></v-text-field>
                <v-text-field
                    label="ホームページURL"
                    v-model="createCompanyForm.hp_url"
                    :error-messages="validationErrors.hp_url"
                    variant="outlined"
                    color="info"
                ></v-text-field>
                <v-text-field
                    label="所在地"
                    v-model="createCompanyForm.location"
                    :error-messages="validationErrors.location"
                    variant="outlined"
                    color="info"
                ></v-text-field>
            </v-form>
        </template>
        <template #actions>
            <v-btn
                @click="createCompanyDialogOpen = false"
                variant="outlined"
                color="info"
                >キャンセル</v-btn
            >
            <v-btn @click="createCompany" variant="flat" color="info"
                >追加</v-btn
            >
        </template>
    </FormDialog>
    <SnackBar
        :isSnackbar="isSnackbar"
        @update:isSnackbar="isSnackbar = $event"
    />
</template>
