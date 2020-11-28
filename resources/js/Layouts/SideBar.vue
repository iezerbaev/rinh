<template>
    <div class="sidebar">
        <div class="sidebar__top">
            <inertia-link class="sidebar-link" :href="route('dashboard')">
                <img class="sidebar-link__icon" width="20" height="20" :src="'/assets/sidebar-links-icons/possibility.svg'" />
                <span class="sidebar-link__text">Возможности</span>
            </inertia-link>
            <inertia-link class="sidebar-link" :href="route('dashboard')">
                <img class="sidebar-link__icon" width="20" height="20" :src="'/assets/sidebar-links-icons/cabinet.svg'"/>
                <span class="sidebar-link__text">Личный кабинет</span>
            </inertia-link>
            <inertia-link class="sidebar-link" :href="route('project.index')">
                <img class="sidebar-link__icon" width="20" height="20" :src="'/assets/sidebar-links-icons/stack.svg'"/>
                <span class="sidebar-link__text">Проекты</span>
            </inertia-link>
            <inertia-link class="sidebar-link" :href="route('networking.index')">
                <img class="sidebar-link__icon" width="20" height="20" :src="'/assets/sidebar-links-icons/networking.svg'"/>
                <span class="sidebar-link__text">Нетворкинг</span>
            </inertia-link>
            <inertia-link class="sidebar-link" :href="route('science.activity.index')">
                <img class="sidebar-link__icon" width="20" height="20" :src="'/assets/sidebar-links-icons/projects.svg'"/>
                <span class="sidebar-link__text">Научная деятельность</span>
            </inertia-link>

        </div>

        <div class="sidebar__bottom">
            <inertia-link class="sidebar-link" :href="route('profile.show')">
                <img class="sidebar-link__icon" width="20" height="20" :src="'/assets/sidebar-links-icons/settings.svg'"/>
                <span class="sidebar-link__text">Настройки</span>
            </inertia-link>
            <form class="sidebar-link" @submit.prevent="logout">
                <img class="sidebar-link__icon" width="20" height="20" :src="'/assets/sidebar-links-icons/logout.svg'"/>
                <jet-dropdown-link class="sidebar-link__text" as="button">
                    Выйти
                </jet-dropdown-link>
            </form>
        </div>
    </div>
</template>

<script>
import JetDropdownLink from "@/Jetstream/DropdownLink";
export default {
    name: "SideBar",
    components: {
        JetDropdownLink
    },
    methods: {
        logout() {
            axios.post(route('logout').url()).then(response => {
                window.location = '/';
            })
        }
    }
}
</script>

<style scoped>

</style>
