<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionContainer from "@/Components/common/surfaces/SectionContainer.vue";
import CompanyInfoCard from "@/Components/domain/user/applicant_company_show/CompanyInfoCard.vue";
import SelectionTimelineCard from "@/Components/domain/user/applicant_company_show/SelectionTimelineCard.vue";
import CreateSelectionButton from "@/Components/domain/user/applicant_company_show/CreateSelectionButton.vue";
import CompanyQaListItem from "@/Components/domain/user/applicant_company_show/CompanyQaListItem.vue";
import CreateCompanyQaButton from "@/Components/domain/user/applicant_company_show/CreateCompanyQaButton.vue";

const props = defineProps({
    applicantCompany: Object,
});

const alreadyExistQaNumber = props.applicantCompany.applicant_company_qas.map(qa => qa.id)

console.log(props.applicantCompany);
</script>

<template>
    <AuthenticatedLayout>
        <SectionContainer title="会社情報">
            <CompanyInfoCard :applicantCompany="applicantCompany" />
        </SectionContainer>
        <SectionContainer title="選考状況">
            <template #createButton>
                <CreateSelectionButton :applicantCompanyId="props.applicantCompany.id" />
            </template>
            <v-timeline side="end">
                <v-timeline-item
                    v-for="selection in applicantCompany.selections"
                    :key="selection.id"
                    dot-color="primary"
                >
                    <SelectionTimelineCard :selection="selection" :applicantCompanyId="props.applicantCompany.id" />
                </v-timeline-item>
            </v-timeline>
            
        </SectionContainer>
        <SectionContainer title="面接対策">
            <template #createButton>
                <CreateCompanyQaButton :alreadyExistQaNumber="alreadyExistQaNumber" :applicantCompanyId="props.applicantCompany.id" />
            </template>
            <template 
                v-for="companyQa in applicantCompany.applicant_company_qas"
                :key="companyQa.id"
            >
                <CompanyQaListItem :companyQa="companyQa" />
            </template>
        </SectionContainer>
    </AuthenticatedLayout>
</template>
