<script setup lang="ts">
import { selectionStatuses } from "@/constants";

defineProps({
    company: Object
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
                <v-spacer></v-spacer>
                <v-sheet class="align-self-center"
                    >{{ company.company.name }}</v-sheet
                >
                <v-spacer></v-spacer>
            </div>
        </v-expansion-panel-title>
        <v-expansion-panel-text>
            {{ company.memo }}
            <v-btn
                    color="primary"
                    variant="flat"
                    :href="
                        route(
                            'user.applicant_company.show',
                            company.id
                        )
                    "
                    class="me-4"
                    @click.stop
                >
                    詳細
                </v-btn>
        </v-expansion-panel-text>
    </v-expansion-panel>
</template>