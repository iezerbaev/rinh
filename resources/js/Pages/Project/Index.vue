<template>
    <app-layout>
        <div>
            <tabs class="tabs max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <tab title="Мои проекты" class="tabs__button">
                    <h1 class="accent-title">Мои проекты</h1>
                    <project description="длинное описание проекта"
                             project-name="имя проекта"
                             department="отрасль проекта"
                             stage="стадия проекта"
                             commercialization="описание коммерациализации проекта"/>
                </tab>
                <tab title="Командные проекты" class="tabs__button">
                    Командные проекты
                </tab>
                <tab title="Добавить новый проект" class="tabs__button">
                    <h1 class="accent-title">Добавить новый проект</h1>
                    <add-project />
                </tab>
            </tabs>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Project from '@/Pages/Project/MyProjects';
import AddProject from "@/Pages/Project/AddProject";
import { Tabs, Tab } from 'vue-slim-tabs';
export default {
    components: {
        AppLayout,
        AddProject,
        Project,
        Tabs,
        Tab
    },
    props: ['data'],
    name: "Index"
}
</script>

<style>
@import '../../../css/projects.css';
</style>
