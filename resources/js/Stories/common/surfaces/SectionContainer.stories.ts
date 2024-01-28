// Replace vue3 with vue if you are using Storybook for Vue 2
import type { Meta, StoryObj } from '@storybook/vue3';
import SectionContainer from '@/Components/common/surfaces/SectionContainer.vue';

// More on how to set up stories at: https://storybook.js.org/docs/writing-stories
const meta: Meta<typeof FormDialog> = {
	title: 'common/Serfaces/SectionContainer',
	component: SectionContainer,
	tags: ['autodocs'],
	argTypes: {
	    title: {
            control: {
                type: 'text',
            },
        }
	},
};
export default meta;

type StoryType = StoryObj<typeof SectionContainer>;

export const Sample: StoryType = {
    args: {
        title: 'Title',
    },
};
