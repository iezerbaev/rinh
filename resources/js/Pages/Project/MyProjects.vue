<template>
    <div class="project-card">
        <div class="project-card__title block-description-text">{{ projectName }}</div>
        <div class="project-card__department block-description-text">{{ department }}</div>
        <div class="project-card__stage block-description-text">{{ stage }}</div>
        <div class="project-card__description block-description-text truncate" @click="expandText">
            {{ description }}
        </div>
        <div class="project-card__files block-description-text">
            <file-view file-name="описание_проекта.pdf" :url-to-download="pdf_download" />
            <file-view file-name="описание_проекта.docx" :url-to-download="doc_download" />
        </div>
        <div class="project-card__commercialization block-description-text truncate" @click="expandText">
            {{ commercialization }}
        </div>
        <div class="user-card-tags">
            <div class="user-card-tags__tag" v-for="tag of tags"> {{ tag.type }} </div>
        </div>
        <div class="card-footer" data-project-id="1810">
            <div class="card-footer__btn change button-active" @click="toggleChangeModal">Изменить</div>
            <div class="card-footer__btn remove button-active">Удалить</div>
        </div>

        <vodal :show="show" animation="slideLeft" @hide="show=false" :width='600'>
            <form action="" class="project-fill">
                <input type="hidden" name="id" :value="id">
                <input type="text" class="project-fill__input" name="name" placeholder="наименование" :value="projectName" />
                <input type="text" class="project-fill__input" name="department" placeholder="отрасль" :value="department" />
                <input type="text" class="project-fill__input" name="stage" placeholder="стадия" :value="stage" />
                <textarea class="project-fill__input" name="description" placeholder="описание">{{ description }}</textarea>
                <textarea class="project-fill__input" name="commercialization" placeholder="коммерциализация">{{ commercialization }}</textarea>
                <div class="card-footer" data-project-id="1810">
                    <input type="submit" class="card-footer__btn change button-active" value="Сохранить" @click.prevent="toggleChangeModal">
                </div>
            </form>
        </vodal>
    </div>
</template>

<script>
import Vodal from 'vodal';
import FileView from '@/Pages/Project/Components/FileView';

export default {
    props: {
        projectName: {
            type: String,
            required: true
        },
        department: {
            type: String,
            required: true
        },
        stage: {
            type: String,
            required: true
        },
        id: Number,
        description: String,
        commercialization: String,
        pdf_download: String,
        doc_download: String,
        tags: Array
    },
    components: {
        FileView,
        Vodal
    },
    data() {
        return {
            show: false,
        }
    },
    methods: {
        expandText(event) {
            let e = e || event;

            if (e.target.classList.contains('truncate'))
                e.target.classList.remove('truncate');
        },
        toggleChangeModal() {
            this.$data.show = !this.$data.show;
        }
    },
    name: "MyProjects"
}
</script>

<style>
@import "vodal/common.css";
@import "vodal/slide-left.css";
</style>
