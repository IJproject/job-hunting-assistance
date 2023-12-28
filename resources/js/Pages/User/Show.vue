<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionContainer from "@/Components/common/surfaces/SectionContainer.vue";
import UserInfoCard from "@/Components/domain/user/show/UserInfoCard.vue";
import UserQaListItem from "@/Components/domain/user/show/UserQaListItem.vue";
import CreateUserQaButton from "@/Components/domain/user/show/CreateUserQaButton.vue";

const props = defineProps({
    authUser: Object,
});

console.log(props.authUser);

const alreadyExistQaNumber = props.authUser.user_qas.map(qa => qa.id)
</script>

<template>
    <AuthenticatedLayout>
        <SectionContainer title="プロフィール">
            <UserInfoCard :authUser="authUser"/>
        </SectionContainer>
        <SectionContainer title="自己分析">
            <template #createButton>
                <CreateUserQaButton :alreadyExistQaNumber="alreadyExistQaNumber" :authUserId="authUser.id" />
            </template>
            <template v-for="userQa in authUser.user_qas" :key="userQa.id">
                <UserQaListItem :userQa="userQa"/>
            </template>
            
        </SectionContainer>
    </AuthenticatedLayout>
</template>
