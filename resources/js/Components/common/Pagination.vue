<script setup lang="ts">
import { ref, watch } from "vue";

const props = defineProps({
    links: Array,
    pageCount: Number,
});

const paginationLinks = props.links;
const url = new URL(window.location.href);
const params = new URLSearchParams(url.search);
const page = ref(params.get('page') ? Number(params.get('page')) : 1);

watch(page, (newPage) => {
    if(newPage === 0){
        window.location.href = paginationLinks[1].url;
    } else if(newPage === paginationLinks.length - 1) {
        window.location.href = paginationLinks[paginationLinks.length - 2].url;
    } else if(newPage) {
        window.location.href = paginationLinks[newPage].url;
    }
});
</script>

<template>
    <v-pagination
        v-model="page"
        :length="pageCount"
    ></v-pagination>
</template>