<script setup lang="ts">
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SectionContainer from '@/Components/common/surfaces/SectionContainer.vue';
import CompanyListItem from '@/Components/domain/user/index/CompanyListItem.vue';
import { GetUserCompanyList } from '@/Types/user';

const props = defineProps<{
	user_companies: GetUserCompanyList[];
}>();

// expansion-panelsの開閉状態を管理するstate
const panel = ref([]);

console.log(props.user_companies);
</script>

<template>
	<AuthenticatedLayout>
		<SectionContainer title="選考中企業">
			<v-expansion-panels v-model="panel" multiple>
				<template
					v-for="company in user_companies"
					:key="company.id"
				>
					<CompanyListItem :company="company" />
				</template>
			</v-expansion-panels>
		</SectionContainer>
	</AuthenticatedLayout>
</template>
