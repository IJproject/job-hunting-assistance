<script setup lang="ts">
import { ref } from "vue";

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionContainer from "@/Components/common/surfaces/SectionContainer.vue";
import UserInfoCard from "@/Components/domain/user/index/UserInfoCard.vue";
import CompanyListItem from "@/Components/domain/user/index/CompanyListItem.vue";

const props = defineProps({
    authUser: Object,
    applicantCompanies: Array,
});

const panel = ref([]);

const underSelectionCount = props.applicantCompanies.filter(
    (company) => company.selection_status_state === 2
).length;

console.log(props.applicantCompanies);
</script>

<template>
    <AuthenticatedLayout>
        <SectionContainer title="プロフィール">
            <UserInfoCard :authUser="authUser" :underSelectionCount="underSelectionCount" />
        </SectionContainer>
        <SectionContainer title="選考中企業">
            <v-expansion-panels v-model="panel" multiple>
                <template
                    v-for="company in props.applicantCompanies"
                    :key="company.id"
                >
                    <CompanyListItem :company="company" />
                </template>
            </v-expansion-panels>
        </SectionContainer>
    </AuthenticatedLayout>
</template>
