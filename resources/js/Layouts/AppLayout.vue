<template>
    <div class="flex">
        <nav class="main-sidebar">
            <!-- Logo -->
            <div class="nav-logo">
                <inertia-link :href="route('dashboard')">
                    <img class="w-48 h-24 logo-image" :src="'/assets/main-logo.png'" alt="Логотип"/>
                </inertia-link>
            </div>

            <!-- Navigation Links -->
            <side-bar></side-bar>
        </nav>

        <div class="vertical-content">
            <header class="top-header">
                <div></div>
                <div class="top-header__profile-side">
                    <inertia-link class="top-header__btn button-active" :href="route('project.index')">Добавить проект</inertia-link>
                    <profile></profile>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
    import Profile from "@/Components/BarsComponents/Profile";
    import SideBar from "@/Layouts/SideBar";
    export default {
        components: {
            Profile,
            SideBar
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },
        methods: {
            // это тут вообще не нужно (кажется). спать хочу пипец
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            }
        }
    }
</script>

<style>
@import url('../../css/sidebar.css');
</style>
