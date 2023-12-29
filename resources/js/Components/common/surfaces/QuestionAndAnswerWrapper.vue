<script setup lang="ts">
import { aboutCompanyQuestions } from "@/constants";
</script>

<template>
    <v-card elevation="4" class="pa-4 pt-0 pt-sm-4 mb-4">
        <v-sheet>
            <slot name="question" />
        </v-sheet>
        <v-divider thickness="2" class="my-3"></v-divider>
        <v-sheet>
            <slot name="answer" />
        </v-sheet>
    </v-card>
</template>
