<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SectionContainer from '@/Components/common/surfaces/SectionContainer.vue';
import UserCompanyList from '@/Components/domain/user/index/UserCompanyList.vue';
import { GetUserCompanyListItem } from '@/Types/user';

const props = defineProps<{
	user_companies: GetUserCompanyListItem[];
}>();

console.log(props.user_companies);
</script>

<template>
	<AuthenticatedLayout>
		<SectionContainer title="選考中企業">
            <UserCompanyList :user_companies="user_companies" />
		</SectionContainer>
	</AuthenticatedLayout>
</template>
