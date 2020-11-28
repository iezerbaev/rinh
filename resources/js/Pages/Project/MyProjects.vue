<template>
    <div class="project-card">
        <div class="project-card__title block-description-text">{{ projectName }}</div>
        <div class="project-card__department block-description-text">{{ department }}</div>
        <div class="project-card__stage block-description-text">{{ stage }}</div>
        <div class="project-card__description block-description-text truncate" @click="expandText">
            {{ description }}
        </div>
        <div class="project-card__files block-description-text">
            <file-view file-name="описание_проекта.pdf" url-to-download="#" />
            <file-view file-name="описание_проекта.docx" url-to-download="#" />
        </div>
        <div class="project-card__commercialization block-description-text truncate" @click="expandText">
            {{ commercialization }}
        </div>
        <div class="card-footer" data-project-id="1810">
            <div class="card-footer__btn change button-active" @click="toggleChangeModal">Изменить</div>
            <div class="card-footer__btn remove button-active">Удалить</div>
        </div>

        <vodal :show="show" animation="slideLeft" @hide="show=false" :width='600'>
            <form action="" class="project-fill">
                <input type="text" class="project-fill__input" placeholder="наименование" />
                <input type="text" class="project-fill__input" placeholder="отрасль" />
                <input type="text" class="project-fill__input" placeholder="стадия" />
                <textarea class="project-fill__input" placeholder="описание"></textarea>
                <textarea class="project-fill__input" placeholder="коммерциализация"></textarea>
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
        description: String,
        commercialization: String
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
