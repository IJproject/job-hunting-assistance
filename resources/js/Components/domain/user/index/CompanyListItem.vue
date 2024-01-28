<script setup lang="ts">
import { selectionStatuses, selectionStatusColors } from '@/constants';
import { GetUserCompanyList } from '@/Types/user';

defineProps<{
	company: GetUserCompanyList;
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
                        :color="selectionStatusColors[company.status_number]"
                        variant="tonal"
                        size="small"
                        class="align-self-center"
                    >
                        {{ selectionStatuses[company.status_number] }}
                    </v-chip>
                </v-col>
                <v-col cols="auto" class="align-self-center overflow-hidden">
                    {{ company.company_name }}
                </v-col>
				<v-spacer></v-spacer>
			</v-row>
		</v-expansion-panel-title>
		<v-expansion-panel-text>
			<v-row>
				<v-col cols="12" md="auto" class="align-self-center">
					{{ company.memo }}
				</v-col>
				<v-spacer></v-spacer>
				<v-col cols="12" md="auto" class="align-self-center">
					<div class="d-flex justify-center">
						<v-btn
							color="info"
							variant="flat"
							:href="route('user_company.show', company.id)"
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
