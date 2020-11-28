<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Кабинет
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                        <form-section v-for="research in researchWork" class="mt-2">
                            <template #title>
                                Нир
                            </template>
                            <template #description>
                                {{ research.name }}
                            </template>
                            <template #form>
                                <div class="col-span-6 sm:col-span-4">
                                    <jet-label for="firstname" :value="research.links"/>
                                    <jet-label for="firstname" :value="research.place"/>
                                    <jet-label for="firstname" :value="research.date"/>
                                    <jet-label for="firstname" :value="research.type"/>
                                    <jet-label for="firstname" :value="research.created_at"/>
                                </div>
                            </template>
                        </form-section>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                        <form-section v-for="grant in grants" class="mt-2">
                            <template #title>
                                Грант
                            </template>
                            <template #description>
                                {{ grant.name }}
                            </template>
                            <template #form>
                                <div class="col-span-6 sm:col-span-4">
                                    <jet-label for="firstname" :value="grant.links"/>
                                    <jet-label for="firstname" :value="grant.place"/>
                                    <jet-label for="firstname" :value="grant.date"/>
                                    <jet-label for="firstname" :value="grant.type"/>
                                    <jet-label for="firstname" :value="grant.price"/>
                                    <jet-label for="firstname" :value="grant.created_at"/>
                                </div>
                            </template>
                        </form-section>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import FormSection from "@/Jetstream/FormSection";
import JetLabel from '../../Jetstream/Label';


export default {
    props: ['grants', 'researchWork'],
    components: {
        AppLayout,
        FormSection,
        JetLabel
    },
}
</script>
