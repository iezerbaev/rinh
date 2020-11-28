<template>
    <app-layout>

    </app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout';
import Profile from "@/Components/BarsComponents/Profile";
export default {
    props: ['grants', 'researchWork'],
    components: {
        AppLayout,
        Profile
    },
}
</script>
