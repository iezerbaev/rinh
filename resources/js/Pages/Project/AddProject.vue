<template>
    <form action="" class="project-fill">
        <input type="text" class="project-fill__input" placeholder="наименование" />
        <input type="text" class="project-fill__input" placeholder="отрасль" />
        <input type="text" class="project-fill__input" placeholder="стадия" />
        <textarea class="project-fill__input" placeholder="описание"></textarea>
        <div class="project-fill-files block-description-text">
            <input type="file" class="project-fill__file" />
            <input type="file" class="project-fill__file" />
        </div>
        <textarea class="project-fill__input" placeholder="коммерциализация"></textarea>
        <div class="card-footer" data-project-id="1810">
            <input type="submit"
                   class="card-footer__btn change button-active"
                   value="Добавить новый проект">
        </div>
    </form>
</template>

<script>
export default {
name: "AddProject"
}
</script>

<style>
.project-fill-files {
    content: 'прикрепить файлы';
}
</style>
