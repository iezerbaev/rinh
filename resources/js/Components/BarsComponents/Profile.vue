<template>
    <!-- Settings Dropdown -->
    <div class="top-bar">
        <jet-dropdown align="right" width="48">
            <template #content>
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    Настройка Аккаунта
                </div>
                <jet-dropdown-link :href="route('profile.show')">
                    Профиль
                </jet-dropdown-link>
                <div class="border-t border-gray-100"></div>

                <!-- Authentication -->
                <form @submit.prevent="logout">
                    <jet-dropdown-link as="button">
                        Выйти
                    </jet-dropdown-link>
                </form>
            </template>

            <template #trigger>
                <span>{{ $page.user.name }}</span>
                <img :src="$page.user.thumbnail" :alt="$page.user.name" class="inline mr-2 ml-2" width="48" height="48" />
                <img :src="'/assets/sidebar-links-icons/down-arrow.svg'" class="inline" alt="Настройки профиля">
            </template>
        </jet-dropdown>
    </div>
</template>

<script>
import JetDropdown from '@/Jetstream/Dropdown'
import JetDropdownLink from '@/Jetstream/DropdownLink'

export default {
    components: {
        JetDropdown,
        JetDropdownLink
    },
    methods: {
        logout() {
            axios.post(route('logout').url()).then(response => {
                window.location = '/';
            })
        },
    },
    name: "Profile"
}
</script>

<style scoped>

</style>
