// Replace vue3 with vue if you are using Storybook for Vue 2
import type { Meta, StoryObj } from '@storybook/vue3';
import UserCompanyListItem from '@/Components/domain/user/index/UserCompanyListItem.vue';
import { VExpansionPanels } from 'vuetify/lib/components/index.mjs';

// More on how to set up stories at: https://storybook.js.org/docs/writing-stories
const meta: Meta<typeof UserCompanyListItem> = {
	title: 'domain/user/index/UserCompanyListItem',
	component: UserCompanyListItem,
	tags: ['autodocs'],
	argTypes: {
        user_company: {
            description: '登録会社情報（一覧用データ）',
            control: 'object',
        }
    },
    render: (args) => ({
		components: { UserCompanyListItem, VExpansionPanels },
		args: {
            user_company: {
                status_number: 1,
                company_name: 'サンプル会社',
                memo: 'メモ内容',
                id: 123
            },
        },
		setup() {
			return { args };
		},
		template: `
            <v-expansion-panels>
                <UserCompanyListItem v-bind="args">
            </v-expansion-panels>
        `,
	}),
};
export default meta;

type StoryType = StoryObj<typeof UserCompanyListItem>;

export const Sample: StoryType = {
    args: {
        user_company: {
            status_number: 1,
            company_name: 'サンプル会社',
            memo: 'メモ内容',
            id: 123
        },
    },
};
