<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import QuestionAndAnswerWrapper from "@/Components/common/QuestionAndAnswerWrapper.vue";
import FormDialog from "@/Components/common/FormDialog.vue";

import { aboutUserQuestions } from "@/constants";

const props = defineProps({
    userQas: Array,
})

const updateUserQaForm = useForm({
    id: null,
    answer: null,
})
const updateUserQaDialogOpen = ref(false);
const isEdittingQa = ref(null)
const openUpdateUserQaDialog = (id) => {
    isEdittingQa.value = props.userQas.find((qa) => qa.id === id);
    if(isEdittingQa.value) {
        updateUserQaForm.id = isEdittingQa.value.id;
        updateUserQaForm.answer = isEdittingQa.value.answer;
    }
    updateUserQaDialogOpen.value = true
}
const updateUserQa = () => {
    
}
const deleteUserQa = (id) => {
    if(confirm("本当に削除しますか？")) {
        console.log("削除");
    }
}
</script>

<template>
    <template 
        v-for="qa in userQas"
        :key="qa.id"
    >
        <QuestionAndAnswerWrapper>
            <template v-slot:question>
                
                <v-row>
                    <v-col cols="auto" class="align-self-center">
                        {{ aboutUserQuestions[qa.about_user_quetion_state] }}
                    </v-col>
                    <v-spacer></v-spacer>
                    <v-col cols="auto" class="px-0">
                        <v-btn
                            variant="text"
                            icon="mdi-pencil"
                            color="primary"
                            size="small"
                            @click="openUpdateUserQaDialog(qa.id)"
                        >
                        </v-btn>
                    </v-col>
                    <v-col cols="auto" class="pl-0">
                        <v-btn
                            variant="text"
                            icon="mdi-delete"
                            color="error"
                            size="small"
                            @click="deleteUserQa(qa.id)"
                        >
                        </v-btn>
                    </v-col>
                </v-row>
                
            </template>
            <template v-slot:answer>
                <v-row class="py-2">
                    <v-col cols="auto" class="align-self-center">
                        {{ qa.answer }}
                    </v-col>
                </v-row>
            </template>
        </QuestionAndAnswerWrapper>
    </template>
    <FormDialog
        title="回答の更新"
        :dialogOpen="updateUserQaDialogOpen"
        @update:dialogOpen="updateUserQaDialogOpen = $event"
    >
        <template v-slot:main>
            <v-form>
                <v-row>
                    <v-col cols="auto" class="align-self-center mb-3">
                        {{ aboutUserQuestions[isEdittingQa.about_user_quetion_state] }}
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