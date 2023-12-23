<script setup>
defineProps({
    title: {
        type: String,
    },
});
</script>

<template>
    <v-sheet class="my-4">
        <div v-if="title" id="section-title" class="bg-blue-lighten-5 text-h6 px-4 py-2">
            {{ title }}
        </div>
        <v-sheet class="p-4">
            <slot />
        </v-sheet>
    </v-sheet>
</template>

<style>
#section-title {
    border-left: 6px solid rgb(var(--v-theme-primary));
}
</style>