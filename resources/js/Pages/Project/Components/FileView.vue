<template>
    <div class="file-view">
        <div class="file-view__name">{{ fileName }}</div>
        <a class="file-view__download" :href="urlToDownload" v-if="urlToDownload !== undefined">скачать</a>
    </div>
</template>

<script>
export default {
    name: "FileView",
    props: {
        fileName: {
            type: String,
            required: true,
        },
        urlToDownload: {
            type: String,
            required: false
        }
    }
}
</script>

<style scoped>

</style>
