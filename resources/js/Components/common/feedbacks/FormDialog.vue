<script setup lang="ts">
import { ref, watch } from 'vue';
import {
	VBtn,
	VCard,
	VCardActions,
	VCardText,
	VCardTitle,
	VCol,
	VDialog,
	VRow,
	VSpacer,
} from 'vuetify/lib/components/index.mjs';

const props = defineProps({
	dialogOpen: Boolean,
	title: String,
});
const emit = defineEmits(['update:dialogOpen']);

const isOpen = ref(props.dialogOpen);

watch(
	() => props.dialogOpen,
	(newVal) => {
		isOpen.value = newVal;
	}
);

const updateDialogOpen = (newVal) => {
	isOpen.value = newVal;
	emit('update:dialogOpen', newVal);
};
</script>

<template>
	<v-dialog
		v-model="isOpen"
		@update:modelValue="updateDialogOpen"
		:scrollable="false"
		min-width="300"
		max-width="600"
	>
		<v-card>
			<v-card-title>
				<v-row>
					<v-col cols="auto" class="align-self-center">
						<h3 class="text-h5">{{ title }}</h3>
					</v-col>
					<v-spacer></v-spacer>
					<v-col cols="auto">
						<v-btn
							variant="text"
							icon="mdi-close"
							@click="updateDialogOpen(false)"
						>
						</v-btn>
					</v-col>
				</v-row>
			</v-card-title>
			<v-card-text>
				<slot name="main" />
			</v-card-text>
			<v-card-actions>
				<v-row>
					<v-col cols="auto" class="mx-auto">
						<slot name="actions" />
					</v-col>
				</v-row>
			</v-card-actions>
		</v-card>
	</v-dialog>
</template>
