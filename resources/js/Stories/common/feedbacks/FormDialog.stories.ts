// Replace vue3 with vue if you are using Storybook for Vue 2
import type { Meta, StoryObj } from '@storybook/vue3';
import FormDialog from '@/Components/common/feedbacks/FormDialog.vue';

// More on how to set up stories at: https://storybook.js.org/docs/writing-stories
const meta: Meta<typeof FormDialog> = {
	title: 'common/Feedbacks/FormDialog',
	component: FormDialog,
	tags: ['autodocs'],
	argTypes: {
        dialogOpen: {
            control: {
                type: 'select',
            },
            options: ['true', 'false'],
        },
	    title: {
            control: {
                type: 'text',
            },
        }
	},
};
export default meta;

type StoryType = StoryObj<typeof FormDialog>;

export const Normal: StoryType = {
    args: {
        dialogOpen: true,
        title: 'Title',
    },
};
