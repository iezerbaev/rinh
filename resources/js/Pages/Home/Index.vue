<template>
    <app-layout>
        <div class="networking">
            <div class="users-frame">
                <user :name="user.name"
                      :profile_photo="user.profile_photo"
                      :ninja_path="user.ninja_path"
                      :type="user.type"
                      :tags="user.tags">

                </user>
            </div>
            <div class="categories">
                <div class="categories-category-frame" v-for="category of categories">
                    <label class="categories-category-frame-label">
                        <input class="categories-category-frame-input" type="checkbox" :value="category">
                        <span>{{ category }}</span>
                    </label>
                </div>
            </div>
        </div>
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
