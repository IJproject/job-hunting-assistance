<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    search_word: String,
});

const searchCompanyForm = useForm({
    search_word: props.search_word,
});

const searchCompany = () => {
    searchCompanyForm.get(route("company.index"));
};
</script>

<template>
    <v-sheet>
        <v-text-field
            append-inner-icon="mdi-magnify"
            v-model="searchCompanyForm.search_word"
            label="会社名"
            variant="solo"
            color="info"
            placeholder="企業名を入力してください"
            @click:append-inner="searchCompany"
            @keyup.enter="searchCompany"
        ></v-text-field>
    </v-sheet>
</template>