<template>
    <div class="user-card">
        <div class="user-card-header" @click="toggleUserModal">
            <div class="user-card-header-profile">
                <img :src="user.thumbnail" :alt="user.name">
                <div class>
                    <div class="user-card-header__name">{{ user.name }}</div>
                    <div class="user-card-header__ninjapath">{{ user.ninja_path }}</div>
                </div>
            </div>
            <div class="user-card-header__type">
                {{ user.type }}
            </div>
        </div>
        <div class="user-card-tags">
            <div class="user-card-tags__tag" v-for="tag of user.tags"> {{ tag.type }} </div>
        </div>


        <vodal :show="show" animation="slideLeft" @hide="show=false" :height='270' :width='600'>
            <div class="user-card-header" @click="toggleUserModal">
                <div class="user-card-header-profile">
                    <img :src="user.thumbnail" width="64" :alt="user.name">
                    <div class>
                        <div class="user-card-header__name">{{ user.name }}</div>
                        <div class="user-card-header__ninjapath">{{ user.ninja_path }}</div>
                    </div>
                </div>
                <div class="user-card-header__type">
                    {{ user.type }}
                </div>
            </div>
            <div class="contacts">
                <div class="contacts__title">Контактные данные</div>
                <template v-if="user.phone_verified_at !== undefined">
                    <div>Номер телефона: {{ user.phone }}</div>
                </template>
                <div>Почта: {{ user.email }}</div>
                <div>Язык: {{ user.language == 'en' ? 'Английский' : 'Русский' }}</div>
            </div>
            <div class="card-footer__btn change button-active" @click="toggleUserModal">Пригласить в команду</div>
        </vodal>
    </div>

</template>

<script>
import Vodal from 'vodal';
export default {
    name: "User",
    props: ['user'],
    components: {
        Vodal
    },
    data() {
        return {
            show: false
        }
    },
    methods: {
        toggleUserModal() {
            this.$data.show = !this.$data.show;
        }
    }
}
</script>

<style>
@import "vodal/common.css";
@import "vodal/slide-left.css";
</style>
