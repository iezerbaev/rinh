<template>
    <div class="user-card">
        <div class="user-card-header">
            <div class="user-card-header-profile">
                <img :src="profile_photo" :alt="name">
                <div class>
                    <div class="user-card-header__name">{{ name }}</div>
                    <div class="user-card-header__ninjapath">{{ ninja_path }}</div>
                </div>
            </div>
            <div class="user-card-header__type">
                {{ type }}
            </div>
        </div>
        <div class="user-card-tags">
            <div class="user-card-tags__tag" v-for="tag of tags"> {{ tag }} </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "User",
    props: {
        name: String,
        profile_photo: String,
        type: String,
        tags: Array,
        ninja_path: String
    }
}
</script>

<style scoped>

</style>
