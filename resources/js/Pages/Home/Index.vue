<template>
    <app-layout>
        Main Page
    </app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout';
import User from "@/Pages/Home/Components/User";

export default {
    components: {
        AppLayout,
        User
    },
    data() {
        return {

        }
    }
}
</script>

<style>
@import url('../../../css/networking.css');
</style>
