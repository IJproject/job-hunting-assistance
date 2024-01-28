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
            description: 'ダイアログの開閉状況',
			control: {
				type: 'select',
			},
			options: ['true', 'false'],
		},
		title: {
            description: 'ダイアログのタイトル',
			control: {
				type: 'text',
			},
		},
	},
    render: (args) => ({
		components: { FormDialog },
		args: {
			dialogOpen: true,
			title: 'Sample Title',
		},
		setup() {
			return { args };
		},
		template: `
            <FormDialog v-bind="args">
                <template #main>
                    <div>Sample Main</div>
                </template>
                <template #actions>
                    <div>Sample Actions</div>
                </template>
            </FormDialog>
        `,
	}),
};
export default meta;

type StoryType = StoryObj<typeof FormDialog>;

export const Sample: StoryType = {
    args: {
        dialogOpen: true,
        title: 'Sample Title',
    }
};
