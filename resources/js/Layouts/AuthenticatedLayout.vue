<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount } from 'vue';
import axios from 'axios';
import { Inertia } from '@inertiajs/inertia';
import {
	VApp,
	VAppBar,
	VAppBarNavIcon,
	VContainer,
	VDivider,
	VList,
	VListItem,
	VMain,
	VNavigationDrawer,
} from 'vuetify/lib/components/index.mjs';

const navigation_items = [
	{
		id: '1',
		title: 'ホーム',
		icon: 'mdi-account',
		url: '/user',
	},
	{
		id: '2',
		title: 'ブログ',
		icon: 'mdi-post-outline',
		url: '/blog',
	},
];

const navigation_logout = {
	id: '100',
	title: 'ログアウト',
	icon: 'mdi-logout',
};

// 画面幅の取得
const is_mobile = ref<boolean>();
const max_mobile_width = 625;
const getCurrentWinndowWidth = () => {
	is_mobile.value = window.innerWidth < max_mobile_width ? true : false;
};
onMounted(() => {
	getCurrentWinndowWidth();
	window.addEventListener('resize', getCurrentWinndowWidth);
});
onBeforeUnmount(() => {
	window.addEventListener('resize', getCurrentWinndowWidth);
});

// SP時のドロワーの開閉状態を管理するstate
const drawer = ref(false);

// ログアウト処理
const logout = () => {
	axios
		.post(route('logout'))
		.then(() => {
			Inertia.visit(route('login'));
		})
		.catch((error) => {
			console.log('Logout failed:', error);
		});
};
</script>

<template>
	<v-app>
		<!-- SP用レイアウト -->
		<template v-if="is_mobile">
			<v-app-bar color="info">
				<v-app-bar-nav-icon
					variant="text"
					@click.stop="drawer = !drawer"
				>
				</v-app-bar-nav-icon>
				<template #append>
					<span class="mr-2">{{ $page.props.auth!.user.name }}</span>
				</template>
			</v-app-bar>

			<v-navigation-drawer v-model="drawer" temporary>
                <template #prepend>
                    <v-list density="compact" nav>
                        <v-list-item
                            prepend-avatar="https://placehold.jp/100x100.png"
                            :title="$page.props.auth!.user.name"
                            value="user_info"
                            button
                            :href="route('user.show', $page.props.auth!.user.id)"
                        >
                        </v-list-item>
                    </v-list>
                    <v-divider thickness="1"></v-divider>
                </template>
				<v-list density="compact" nav>
					<v-list-item
						v-for="item in navigation_items"
						:key="item.id"
						:prepend-icon="item.icon"
						:title="item.title"
						:value="item.title"
						:href="item.url"
					>
					</v-list-item>
				</v-list>
				<template #append>
					<v-divider thickness="1"></v-divider>
                    <v-list density="compact" nav>
                        <v-list-item
                            @click="logout"
                            :prepend-icon="navigation_logout.icon"
                            :title="navigation_logout.title"
                            value="navigationLogout.title"
                            button
                        >
                        </v-list-item>
                    </v-list>
				</template>
			</v-navigation-drawer>
		</template>

		<!-- PC用レイアウト -->
		<template v-else>
			<v-navigation-drawer color="info" permanent width="200">
                <template #prepend>
                    <v-list density="compact" nav>
                        <v-list-item
                            prepend-avatar="https://placehold.jp/100x100.png"
                            :title="$page.props.auth!.user.name"
                            value="user_info"
                            button
                            :href="route('user.show', $page.props.auth!.user.id)"
                        >
                        </v-list-item>
                    </v-list>
                    <v-divider thickness="1"></v-divider>
                </template>
				<v-list density="compact" nav>
					<v-list-item
						v-for="item in navigation_items"
						:key="item.id"
						:prepend-icon="item.icon"
						:title="item.title"
						:value="item.title"
						:href="item.url"
					>
					</v-list-item>
				</v-list>
				<template #append>
					<v-divider thickness="1"></v-divider>
                    <v-list density="compact" nav>
                        <v-list-item
                            @click="logout"
                            :prepend-icon="navigation_logout.icon"
                            :title="navigation_logout.title"
                            value="navigationLogout.title"
                            button
                            class="mt-1 mb-2"
                        >
                        </v-list-item>
                    </v-list>
				</template>
			</v-navigation-drawer>
		</template>

		<v-main>
			<v-container>
				<slot />
			</v-container>
		</v-main>
	</v-app>
</template>
