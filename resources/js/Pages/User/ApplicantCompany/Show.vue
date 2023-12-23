<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionContainer from "@/Components/common/SectionContainer.vue";

const props = defineProps({
    applicantCompany: Object,
});

console.log(props.applicantCompany);
</script>

<template>
    <AuthenticatedLayout>
        <SectionContainer title="会社情報">
            <div>プロフィールのやつはこっち</div>
        </SectionContainer>
        <SectionContainer title="選考状況">
            <div>cさcvさあ</div>
        </SectionContainer>
        <SectionContainer title="面接対策">
            <div>cas</div>
        </SectionContainer>
    </AuthenticatedLayout>
</template>
