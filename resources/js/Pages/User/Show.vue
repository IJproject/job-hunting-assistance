<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionContainer from "@/Components/common/SectionContainer.vue";
import UserInfoCard from "@/Components/domain/user/show/UserInfoCard.vue";
import UserQaList from "@/Components/domain/user/show/UserQaList.vue";
import CreateUserQaButton from "@/Components/domain/user/show/CreateUserQaButton.vue";

const props = defineProps({
    authUser: Object,
});

console.log(props.authUser);
</script>

<template>
    <AuthenticatedLayout>
        <SectionContainer title="プロフィール">
            <UserInfoCard :authUser="authUser"/>
        </SectionContainer>
        <SectionContainer title="自己分析">
            <template v-slot:createButton>
                <CreateUserQaButton />
            </template>
            <UserQaList :userQas="authUser.user_qas"/>
        </SectionContainer>
    </AuthenticatedLayout>
</template>
