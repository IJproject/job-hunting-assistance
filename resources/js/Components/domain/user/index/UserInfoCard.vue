<script setup lang="ts">
defineProps({
    authUser: Object,
    underSelectionCount: Number,
})
</script>

<template>
    <v-card elevation="4" class="pa-4">
        <v-row>
            <v-col cols="auto" class="align-self-center">
                <v-sheet class="px-2 mx-2">
                    <div class="text-h6">
                        {{ authUser.name }}
                    </div>
                    <div class="text-body-2">
                        選考中企業数：{{ underSelectionCount }}
                    </div>
                </v-sheet>
            </v-col>
            <v-col cols="auto" class="ms-auto align-self-center">
                <v-btn
                    color="info"
                    variant="flat"
                    :href="route('user.show', authUser.id)"
                    class="mx-auto"
                >
                    詳細
                </v-btn>
            </v-col>
        </v-row>
    </v-card>
</template>