<template>
    <app-layout>
        Main Page
    </app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout';
import User from "@/Pages/Home/Components/User";

export default {
    // props: ['users'],
    components: {
        AppLayout,
        User
    },
    data() {
        return {
            user: {
                name: 'Кирилл Абдулов',
                profile_photo: 'https://img.icons8.com/fluent/48/000000/name.png',
                type: 'студент',
                ninja_path: 'веб-разработка',
                tags: [
                    'Дизайн', 'UI/UX','Интерфейсы','Figma','Photoshop','Adobe Illustrator','Логотипы','BrandBooks','и еще чето'
                ]
            },
            categories: [
                'Дизайн',
                'Программирование',
                'Микробиология',
                'Экономика',
                'Менеджемент',
                'История',
                'Аналитика',
                'Разработка ПО',
                'Финансы',
                'Другое'
            ]
        }
    }
}
</script>

<style>
@import url('../../../css/networking.css');
</style>
