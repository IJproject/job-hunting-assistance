<script setup lang="ts">
import { SELECTION_STATUSES, SELECTION_STATUS_COLORS } from '@/constants';
import { GetUserCompanyListItem } from '@/Types/user';
import {
    VBtn,
    VChip,
    VCol,
	VExpansionPanel,
	VExpansionPanelTitle,
    VExpansionPanelText,
    VRow,
    VSpacer,
} from 'vuetify/lib/components/index.mjs';

defineProps<{
	user_company: GetUserCompanyListItem;
}>();
</script>

<template>
	<v-expansion-panel class="mb-2">
		<v-expansion-panel-title
			expand-icon="mdi-plus"
			collapse-icon="mdi-minus"
			class="px-2 px-lg-3"
		>
			<v-row>
				<v-col cols="auto" class="align-self-center">
					<v-chip
						:color="
							SELECTION_STATUS_COLORS[user_company.status_number]
						"
						variant="tonal"
						size="small"
						class="align-self-center"
					>
						{{ SELECTION_STATUSES[user_company.status_number] }}
					</v-chip>
				</v-col>
				<v-col cols="auto" class="align-self-center overflow-hidden">
					{{ user_company.company_name }}
				</v-col>
				<v-spacer></v-spacer>
			</v-row>
		</v-expansion-panel-title>
		<v-expansion-panel-text>
			<v-row>
				<v-col cols="12" md="auto" class="align-self-center">
					{{ user_company.memo }}
				</v-col>
				<v-spacer></v-spacer>
				<v-col cols="12" md="auto" class="align-self-center">
					<div class="d-flex justify-center">
						<v-btn
							color="info"
							variant="flat"
							:href="route('user_company.show', user_company.id)"
							class="me-4"
							@click.stop
						>
							詳細
						</v-btn>
					</div>
				</v-col>
			</v-row>
		</v-expansion-panel-text>
	</v-expansion-panel>
</template>
