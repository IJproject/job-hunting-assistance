<script setup lang="ts">
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

import FormDialog from '@/Components/common/feedbacks/FormDialog.vue'

import { aboutUserQuestions } from '@/constants'
import { changeObjectForVSelect, removeAlreadyExistQa } from '@/functions'

const props = defineProps({
    alreadyExistQaNumber: Array,
    authUserId: Number,
})

const qaList = removeAlreadyExistQa(
    props.alreadyExistQaNumber,
    aboutUserQuestions
)

const createUserQaForm = useForm({
    user_id: props.authUserId,
    about_user_quetion_state: null,
    answer: null,
})
const createUserQaDialogOpen = ref(false)
const createUserQa = () => {
    if (
        !props.alreadyExistQaNumber.includes(
            Number(createUserQaForm.about_user_quetion_state)
        )
    ) {
        createUserQaForm.post(route('user.user_qa.store'), {
            onSuccess: () => {
                createUserQaDialogOpen.value = false
                createUserQaForm.reset()
            },
            onError: (error) => {
                console.log(error)
            },
        })
    }
}
</script>

<template>
    <v-btn color="info" variant="flat" @click="createUserQaDialogOpen = true">
        追加
    </v-btn>
    <FormDialog
        title="分析の追加"
        :dialogOpen="createUserQaDialogOpen"
        @update:dialogOpen="createUserQaDialogOpen = $event"
    >
        <template #main>
            <v-form>
                <v-select
                    label="質問"
                    v-model="createUserQaForm.about_user_quetion_state"
                    :items="changeObjectForVSelect(qaList)"
                    item-title="label"
                    item-value="id"
                    variant="outlined"
                    color="info"
                ></v-select>
                <v-textarea
                    label="回答"
                    v-model="createUserQaForm.answer"
                    auto-grow
                    variant="outlined"
                    rows="2"
                    color="info"
                ></v-textarea>
            </v-form>
        </template>
        <template #actions>
            <v-btn
                @click="createUserQaDialogOpen = false"
                variant="outlined"
                color="info"
                >キャンセル</v-btn
            >
            <v-btn @click="createUserQa" variant="flat" color="info"
                >追加</v-btn
            >
        </template>
    </FormDialog>
</template>
