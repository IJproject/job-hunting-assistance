<script setup lang="ts">
import { ref, watch } from "vue";

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionContainer from "@/Components/common/surfaces/SectionContainer.vue";
import CreateCompanyButton from "@/Components/domain/company/CreateCompanyButton.vue";
import SearchCompanyForm from "@/Components/domain/company/SearchCompanyForm.vue";
import CompanyListItem from "@/Components/domain/company/CompanyListItem.vue";
import Pagination from "@/Components/common/feedbacks/Pagination.vue";

const props = defineProps({
    companies: Array,
    search_word: String,
});

console.log(props.companies.data);
</script>

<template>
    <AuthenticatedLayout>
        <SectionContainer title="会社一覧">
            <template v-slot:createButton>
                <CreateCompanyButton />
            </template>
            <SearchCompanyForm :search_word="search_word" />
            <v-row>
                <template v-for="company in companies.data" :key="company.id">
                    <CompanyListItem :company="company" />
                </template>
            </v-row>
        </SectionContainer>
        <Pagination :links="companies.links" :pageCount="companies.last_page" />
    </AuthenticatedLayout>
</template>
