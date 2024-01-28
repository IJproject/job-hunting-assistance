import { StorybookConfig } from "@storybook/vue3-vite"
const path = require('path');

/** @type { import('@storybook/vue3-vite').StorybookConfig } */
const config: StorybookConfig = {
    stories: [
        '../**/*.mdx',
        '../**/*.stories.@(js|jsx|mjs|ts|tsx)',
    ],
    addons: [
        '@storybook/addon-links',
        '@storybook/addon-essentials',
        '@storybook/addon-interactions',
    ],
    framework: {
        name: '@storybook/vue3-vite',
        options: {},
    },
    docs: {
        autodocs: 'tag',
    },
    async viteFinal(config, { configType }) {
        if(config.resolve !== undefined){
            config.resolve.alias = {
                ...config.resolve.alias,
                '@': path.resolve(__dirname, '../..'),
            };
        }
        return config;
    },
}
export default config
