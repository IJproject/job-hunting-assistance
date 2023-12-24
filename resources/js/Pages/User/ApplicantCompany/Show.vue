<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionContainer from "@/Components/common/SectionContainer.vue";
import CompanyInfoCard from "@/Components/domain/user/applicant_company_show/CompanyInfoCard.vue";
import SelectionTimeline from "@/Components/domain/user/applicant_company_show/SelectionTimeline.vue";
import CreateSelectionButton from "@/Components/domain/user/applicant_company_show/CreateSelectionButton.vue";
import CompanyQaList from "@/Components/domain/user/applicant_company_show/CompanyQaList.vue";
import CreateCompanyQaButton from "@/Components/domain/user/applicant_company_show/CreateCompanyQaButton.vue";

const props = defineProps({
    applicantCompany: Object,
});

console.log(props.applicantCompany);
</script>

<template>
    <AuthenticatedLayout>
        <SectionContainer title="会社情報">
            <CompanyInfoCard :applicantCompany="applicantCompany" />
        </SectionContainer>
        <SectionContainer title="選考状況">
            <template v-slot:createButton>
                <CreateSelectionButton />
            </template>
            <SelectionTimeline :selections="applicantCompany.selections" />
        </SectionContainer>
        <SectionContainer title="面接対策">
            <template v-slot:createButton>
                <CreateCompanyQaButton />
            </template>
            <CompanyQaList :companyQas="applicantCompany.applicant_company_qas" />
        </SectionContainer>
    </AuthenticatedLayout>
</template>
