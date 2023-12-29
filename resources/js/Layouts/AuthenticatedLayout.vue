<script setup lang="ts">
import { ref } from "vue";
import axios from "axios";
import { Inertia } from "@inertiajs/inertia";

const navigationItems = [
    {
        id: '1',
        title: 'ホーム',
        icon: 'mdi-account',
        url: '/user'
    },
    {
        id: '2',
        title: '企業一覧',
        icon: 'mdi-office-building',
        url: '/company'
    },
    {
        id: '3',
        title: 'ブログ',
        icon: 'mdi-post-outline',
        url: '/blog'
    },
]

const navigationLogout = {
    id: '100',
    title: 'ログアウト',
    icon: 'mdi-logout',
}

const drawer = ref(true);
const rail = ref(true);

const logout = () => {
    axios.post(route('logout'))
        .then(() => {
            Inertia.visit(route('login'))
        })
        .catch(error => {
            console.log('Logout failed:', error)
        });
}
</script>

<template>
    <v-app>
        <v-navigation-drawer
            v-model="drawer"
            :rail="rail"
            permanent
            @click="rail = false"
            color="info"
        >
            <v-list-item
                prepend-avatar="https://randomuser.me/api/portraits/men/85.jpg"
                :title="$page.props.auth.user.name"
                nav
            >
                <template v-if="!rail" #append>
                    <v-btn
                        variant="text"
                        icon="mdi-chevron-left"
                        @click.stop="rail = !rail"
                    ></v-btn>
                </template>
                <template #prepend>
                    <v-avatar class="my-2" size="36">
                        <v-img
                            src="https://randomuser.me/api/portraits/men/85.jpg"
                            alt="ユーザーの写真"
                        ></v-img>
                    </v-avatar>
                </template>
            </v-list-item>

            <v-divider></v-divider>

            <v-list density="compact" nav>
                <v-list-item
                    v-for="item in navigationItems"
                    :key="item.id"
                    :prepend-icon="item.icon"
                    :title="item.title"
                    :value="item.title"
                    :href="item.url"
                >
                </v-list-item>
                <v-divider thickness="2" class="mb-1"></v-divider>
                <v-list-item
                    @click="logout"
                    :prepend-icon="navigationLogout.icon"
                    :title="navigationLogout.title"
                    value="navigationLogout.title"
                    button
                >
                </v-list-item>
            </v-list>
            <template #append></template>
        </v-navigation-drawer>

        <v-main>
            <v-container>
                <slot />
            </v-container>
        </v-main>
    </v-app>
</template>
