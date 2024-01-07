<template>
    <v-row class="my-2">
        <v-spacer></v-spacer>
        <v-col cols="auto" class="ms-auto align-self-center">
            <v-btn
                color="info"
                variant="flat"
                :href="route('company.index')"
                class="mx-auto"
            >
                企業の追加
            </v-btn>
        </v-col>
        <v-spacer></v-spacer>
    </v-row>
</template>