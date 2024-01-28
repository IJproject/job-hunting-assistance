import { Preview, setup } from '@storybook/vue3';
import { createVuetify } from 'vuetify';
import '../../../css/app.css';
import 'vuetify/styles';
import '@mdi/font/css/materialdesignicons.css';
import { themeColors } from '../../theme';
import { VApp } from 'vuetify/lib/components/index.mjs';

const vuetify = createVuetify({
	theme: {
		defaultTheme: 'themeColors',
		themes: {
			themeColors,
		},
	},
});

setup((app) => {
	app.use(vuetify);
});

export const decorators = [
	(story) => ({
		components: { story, VApp },
		vuetify,
		template: '<story/>',
	}),
];

/** @type { import('@storybook/vue3').Preview } */
const preview: Preview = {
	parameters: {
		actions: { argTypesRegex: '^on[A-Z].*' },
		controls: {
			matchers: {
				color: /(background|color)$/i,
				date: /Date$/i,
			},
		},
	},
};

export default preview;
