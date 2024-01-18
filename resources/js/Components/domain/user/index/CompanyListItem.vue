<script setup lang="ts">
import { selectionStatuses, selectionStatusColors } from "@/constants";

defineProps({
    company: Object,
});

const test = 1
</script>

<template>
    <v-expansion-panel class="mb-2">
        <v-expansion-panel-title
            expand-icon="mdi-plus"
            collapse-icon="mdi-minus"
            class="px-2 px-lg-3"
        >
            <div class="d-flex flex-row w-100">
                <v-chip
                    :color="
                        selectionStatusColors[company.selection_status_state]
                    "
                    variant="tonal"
                    size="small"
                    class="align-self-center"
                    >{{
                        selectionStatuses[company.selection_status_state]
                    }}</v-chip
                >
                <v-spacer></v-spacer>
                <v-sheet class="align-self-center">{{
                    company.company.name
                }}</v-sheet>
                <v-spacer></v-spacer>
            </div>
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
                            :href="route('user.applicant_company.show', company.id)"
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
