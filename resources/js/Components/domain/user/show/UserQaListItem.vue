<script setup lang="ts">
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

import QuestionAndAnswerWrapper from '@/Components/common/surfaces/QuestionAndAnswerWrapper.vue'
import FormDialog from '@/Components/common/feedbacks/FormDialog.vue'

import { aboutUserQuestions } from '@/constants'

const props = defineProps({
    userQa: Object,
})

const updateUserQaForm = useForm({
    id: props.userQa.id,
    user_id: props.userQa.user_id,
    about_user_quetion_state: props.userQa.about_user_quetion_state,
    answer: props.userQa.answer,
})
const updateUserQaDialogOpen = ref(false)

const updateUserQa = () => {
    updateUserQaForm.post(route('user.user_qa.store'), {
        onSuccess: () => {
            updateUserQaDialogOpen.value = false
        },
        onError: (error) => {
            console.log(error)
        },
    })
}
const deleteUserQa = () => {
    if (confirm('本当に削除しますか？')) {
        console.log('削除')
    }
}
</script>

<template>
    <QuestionAndAnswerWrapper>
        <template #question>
            <!-- 横幅がsm以上でこれを表示 -->
            <v-row class="d-none d-sm-flex">
                <v-col class="align-self-center overflow-hidden">
                    {{ aboutUserQuestions[userQa.about_user_quetion_state] }}
                </v-col>
                <v-col cols="auto" class="px-0">
                    <v-btn
                        variant="text"
                        icon="mdi-pencil"
                        color="info"
                        size="small"
                        @click="updateUserQaDialogOpen = true"
                    >
                    </v-btn>
                </v-col>
                <v-col cols="auto" class="pl-0">
                    <v-btn
                        variant="text"
                        icon="mdi-delete"
                        color="error"
                        size="small"
                        @click="deleteUserQa"
                    >
                    </v-btn>
                </v-col>
            </v-row>
            <!-- 横幅がsm以下でこれを表示 -->
            <v-row class="d-sm-none">
                <v-spacer></v-spacer>
                <v-col cols="auto" class="px-0 pt-0">
                    <v-btn
                        variant="text"
                        icon="mdi-pencil"
                        color="info"
                        size="small"
                        @click="updateUserQaDialogOpen = true"
                    >
                    </v-btn>
                </v-col>
                <v-col cols="auto" class="pl-0 pt-0">
                    <v-btn
                        variant="text"
                        icon="mdi-delete"
                        color="error"
                        size="small"
                        @click="deleteUserQa"
                    >
                    </v-btn>
                </v-col>
            </v-row>
            <v-sheet class="d-sm-none">
                {{ aboutUserQuestions[userQa.about_user_quetion_state] }}
            </v-sheet>
        </template>
        <template #answer>
            <v-row class="py-2">
                <v-col cols="auto" class="align-self-center">
                    {{ userQa.answer }}
                </v-col>
            </v-row>
        </template>
    </QuestionAndAnswerWrapper>
    <FormDialog
        title="回答の更新"
        :dialogOpen="updateUserQaDialogOpen"
        @update:dialogOpen="updateUserQaDialogOpen = $event"
    >
        <template #main>
            <v-form>
                <v-row>
                    <v-col cols="auto" class="align-self-center mb-3">
                        {{
                            aboutUserQuestions[userQa.about_user_quetion_state]
                        }}
                    </v-col>
                </v-row>

                <v-textarea
                    label="回答"
                    v-model="updateUserQaForm.answer"
                    auto-grow
                    variant="outlined"
                    rows="2"
                    color="info"
                ></v-textarea>
            </v-form>
        </template>
        <template #actions>
            <v-btn
                @click="updateUserQaDialogOpen = false"
                variant="outlined"
                color="info"
                >キャンセル</v-btn
            >
            <v-btn @click="updateUserQa" variant="flat" color="info"
                >更新</v-btn
            >
        </template>
    </FormDialog>
</template>
