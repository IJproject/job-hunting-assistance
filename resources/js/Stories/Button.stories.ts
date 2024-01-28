// Replace vue3 with vue if you are using Storybook for Vue 2
import type { Meta, StoryObj } from '@storybook/vue3';
import MyButton from './Button.vue';

// More on how to set up stories at: https://storybook.js.org/docs/writing-stories
const meta: Meta<typeof MyButton> = {
	title: 'Example/Button',
	component: MyButton,
	tags: ['autodocs'],
	argTypes: {
		backgroundColor: {
			control: 'color',
		},
		onClick: {},
		size: {
			control: {
				type: 'select',
			},
			options: ['small', 'medium', 'large'],
		},
	},
};
export default meta;

type StoryType = StoryObj<typeof MyButton>;

// More on writing stories with args: https://storybook.js.org/docs/writing-stories/args
export const Primary: StoryType = {
	args: {
		primary: true,
		label: 'Button',
	},
};

export const Secondary: StoryType = {
	args: {
		label: 'Button',
	},
};

export const Buttons = {
	render: () => ({
		components: { MyButton },
		template: `
            <div>
                <MyButton size="large" primary label="label">Large</MyButton>
            </div>
        `,
	}),
};
