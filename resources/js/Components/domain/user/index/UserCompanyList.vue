<script setup lang="ts">
import { ref } from 'vue';
import UserCompanyListItem from '@/Components/domain/user/index/UserCompanyListItem.vue';
import { GetUserCompanyListItem } from '@/Types/user';
import { VExpansionPanels } from 'vuetify/lib/components/index.mjs';

defineProps<{
    user_companies: GetUserCompanyListItem[];
}>();

// expansion-panelsの開閉状態を管理するstate
const panel = ref([]);
</script>

<template>
    <v-expansion-panels v-model="panel" multiple>
        <template
            v-for="user_company in user_companies"
            :key="user_company.id"
        >
            <UserCompanyListItem :user_company="user_company" />
        </template>
    </v-expansion-panels>
</template>