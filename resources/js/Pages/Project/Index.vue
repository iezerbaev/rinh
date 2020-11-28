<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Проекты
            </h2>
        </template>

        <tabs class="tabs max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <tab title="Мои проекты" class="tabs__button">
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
                <add-project />
            </tab>
        </tabs>


    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import Project from '@/Pages/Project/MyProjects';
import AddProject from "@/Pages/Project/AddProject";
import { Tabs, Tab } from 'vue-slim-tabs';
export default {
    components: {
        AppLayout,
        JetButton,
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
