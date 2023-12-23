<script setup lang="ts">
import { selectionStatuses } from "@/constants";

defineProps({
    company: {
        type: Object,
    },
});
</script>

<template>
    <v-expansion-panel class="mb-2">
        <v-expansion-panel-title
            expand-icon="mdi-plus"
            collapse-icon="mdi-minus"
        >
            <div class="d-flex flex-row w-100">
                <v-chip
                    color="primary"
                    variant="flat"
                    class="align-self-center"
                    >{{
                        selectionStatuses[
                            company.selection_status_state
                        ]
                    }}</v-chip
                >
                <v-sheet class="align-self-center"
                    >Flex item 2</v-sheet
                >
                <v-spacer></v-spacer>
                <v-btn
                    color="primary"
                    variant="tonal"
                    :href="
                        route(
                            'user.applicant_company',
                            company.id
                        )
                    "
                    class="me-4"
                    @click.stop
                >
                    詳細
                </v-btn>
            </div>
        </v-expansion-panel-title>
        <v-expansion-panel-text>
            {{ company.memo }}
        </v-expansion-panel-text>
    </v-expansion-panel>
</template>