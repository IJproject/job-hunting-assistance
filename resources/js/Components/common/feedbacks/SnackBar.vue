<script setup lang="ts">
import { ref } from 'vue'

const props = defineProps({
    isSnackbar: Boolean,
})

const emit = defineEmits(['update:isSnackbar'])

const isSnackbar = ref(props.isSnackbar)

const updateIsSnackbar = (newVal) => {
    isSnackbar.value = newVal
    console.log('newval', newVal)
    emit('update:isSnackbar', newVal)
}
</script>

<template>
    <v-snackbar
        v-model="isSnackbar"
        @update:modelValue="updateIsSnackbar"
        timeout="3000"
        color="success"
        location="top right"
    >
        正常に企業登録が完了しました。
        <template v-slot:actions>
            <v-btn
                color="white"
                variant="text"
                icon="mdi-close"
                @click="isSnackbar = false"
            >
            </v-btn>
        </template>
    </v-snackbar>
</template>
