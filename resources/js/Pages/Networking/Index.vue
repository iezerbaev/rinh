<template>
    <app-layout>
        <div class="networking">
            <div class="users-frame">
                <user v-for="user of users"
                      :name="user.name"
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
    props: ['users'],
    components: {
        AppLayout,
        User
    },
    data() {
        return {
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
