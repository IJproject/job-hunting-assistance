<script setup lang="ts">
import { VCol, VRow, VSheet } from 'vuetify/lib/components/index.mjs';

defineProps({
	title: String,
});
</script>

<template>
	<v-sheet class="my-4">
		<div
			v-if="title"
			id="section-title"
			class="bg-blue-lighten-5 text-h6 px-4 py-2"
		>
			{{ title }}
		</div>
		<v-row>
			<v-col cols="auto" class="ms-auto my-2 mr-4">
				<slot name="createButton" />
			</v-col>
		</v-row>
		<v-sheet class="pa-4">
			<slot />
		</v-sheet>
	</v-sheet>
</template>

<style>
#section-title {
	border-left: 6px solid rgb(var(--v-theme-info));
}
</style>
