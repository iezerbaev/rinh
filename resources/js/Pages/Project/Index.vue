<template>
    <app-layout>
        <div>
            <tabs class="tabs max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <tab title="Мои проекты" class="tabs__button">
                    <h1 class="accent-title">Мои проекты</h1>
                    <my-project v-for="project in projects"
                             :id=project.id
                             :description="project.description"
                             :project-name="project.name"
                             :department="project.department"
                             :stage="project.stage"
                             :commercialization="project.commercialization"
                             :pdf_download="project.pdf_file"
                             :doc_download="project.doc_file"
                             :tags="project.tags"/>
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
import MyProject from '@/Pages/Project/MyProjects';
import AddProject from "@/Pages/Project/AddProject";
import { Tabs, Tab } from 'vue-slim-tabs';
export default {
    components: {
        AppLayout,
        AddProject,
        MyProject,
        Tabs,
        Tab
    },
    props: ['projects'],
    name: "Index"
}
</script>

<style>
@import '../../../css/projects.css';
</style>
