<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import QuestionAndAnswerWrapper from "@/Components/common/surfaces/QuestionAndAnswerWrapper.vue";
import FormDialog from "@/Components/common/feedbacks/FormDialog.vue";

import { aboutUserQuestions } from "@/constants";

const props = defineProps({
    userQa: Object,
})

const updateUserQaForm = useForm({
    id: props.userQa.id,
    user_id: props.userQa.user_id,
    about_user_quetion_state: props.userQa.about_user_quetion_state,
    answer: props.userQa.answer,
})
const updateUserQaDialogOpen = ref(false);

const updateUserQa = () => {
    updateUserQaForm.post(route('user.user_qa.store'), {
        onSuccess: () => {
            updateUserQaDialogOpen.value = false;
        },
        onError: (error) => {
            console.log(error);
        }
    })
}
const deleteUserQa = () => {
    if(confirm("本当に削除しますか？")) {
        console.log("削除");
    }
}
</script>

<template>
    <QuestionAndAnswerWrapper>
        <template v-slot:question>
            
            <v-row>
                <v-col cols="auto" class="align-self-center">
                    {{ aboutUserQuestions[userQa.about_user_quetion_state] }}
                </v-col>
                <v-spacer></v-spacer>
                <v-col cols="auto" class="px-0">
                    <v-btn
                        variant="text"
                        icon="mdi-pencil"
                        color="primary"
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
            
        </template>
        <template v-slot:answer>
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
        <template v-slot:main>
            <v-form>
                <v-row>
                    <v-col cols="auto" class="align-self-center mb-3">
                        {{ aboutUserQuestions[userQa.about_user_quetion_state] }}
                    </v-col>
                </v-row>
                
                <v-textarea
                    label="回答"
                    v-model="updateUserQaForm.answer"
                    auto-grow
                    variant="outlined"
                    rows="2"
                    color="primary"
                ></v-textarea>
            </v-form>
        </template>
        <template v-slot:actions>
            <v-btn
                @click="updateUserQaDialogOpen = false"
                variant="outlined"
                color="primary"
                >キャンセル</v-btn
            >
            <v-btn @click="updateUserQa" variant="flat" color="primary"
                >更新</v-btn
            >
        </template>
    </FormDialog>
</template>