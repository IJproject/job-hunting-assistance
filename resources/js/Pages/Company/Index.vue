<script setup lang="ts">
import { ref, watch } from "vue";

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SectionContainer from "@/Components/common/SectionContainer.vue";
import Pagination from "@/Components/common/Pagination.vue";

const props = defineProps({
    companies: Array,
});



console.log(props.companies.data);
</script>

<template>
    <AuthenticatedLayout>
        <SectionContainer title="会社一覧">
            <template v-slot:createButton>
                <v-btn
                    color="primary"
                    variant="flat"
                >
                    企業登録
                </v-btn>
            </template>
            <v-sheet>
                <v-text-field
                    append-inner-icon="mdi-magnify"
                    label="会社名"
                    variant="solo"
                    placeholder="企業名を入力してください"
                    @click:append-inner="searchCompany"
                ></v-text-field>
            </v-sheet>
            <v-row>
                <template v-for="company in companies.data" :key="company.id">
                    <v-col cols='12' sm="6" md="4" lg="3">
                        <v-card elevation="4">
                            <v-card-text class="pt-2 pb-6">
                                <v-row>
                                    <v-col cols="auto" class="text-h5 align-self-center">
                                        {{ company.name }}
                                    </v-col>
                                    <v-spacer></v-spacer>
                                    <v-col cols="auto">
                                        <v-btn
                                            color="primary"
                                            icon="mdi-pencil"
                                            variant="text"
                                            
                                        >
                                            
                                        </v-btn>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col cols="auto" class="py-0 me-auto">
                                        <a :href="company.hp_url">{{ company.hp_url }}</a>
                                    </v-col>
                                </v-row>
                            </v-card-text>
                        </v-card>
                    </v-col>
                </template>
            </v-row>
        </SectionContainer>
        <Pagination :links="companies.links" :pageCount="companies.last_page" />
        
    </AuthenticatedLayout>
</template>

<style scoped>
v-input__details {
    padding-inline: 0 !important;
}
</style>