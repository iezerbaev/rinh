<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Проекты
            </h2>
        </template>

        <tabs class="tabs max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <tab title="Мои проекты" class="tabs__button">
                <div class="project-card">
                    <div class="project-card__title block-description-text">Проект</div>
                    <div class="project-card__department block-description-text">Отрасль</div>
                    <div class="project-card__stage block-description-text">Стадия 1</div>
                    <div class="project-card__description block-description-text truncate" @click="expandText">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, culpa delectus dolore expedita explicabo id in ipsam ipsum iusto laborum magni totam unde ut veritatis voluptatem. Autem et ipsum iste sequi tempora. Animi asperiores ex modi omnis, praesentium qui quo! Earum eligendi quis quo quos similique. Accusamus adipisci architecto consequatur, debitis dolor eius error esse in libero, magnam magni minus mollitia nam nihil non pariatur perferendis perspiciatis, porro quia quod reiciendis rem soluta suscipit tempore vitae voluptas voluptatum. Adipisci aliquam dolorem id illo, magni maiores obcaecati officiis quisquam sunt voluptatibus! Aspernatur commodi ducimus obcaecati, quis sunt suscipit unde. Accusamus adipisci atque aut culpa deserunt dolor eligendi facilis hic impedit itaque magnam maxime molestias officiis porro quaerat quas repellendus sit suscipit, vitae voluptatem? Ab aliquam blanditiis culpa dolores earum eius est ex exercitationem fuga fugit in inventore ipsum maxime quidem quisquam, quo ratione recusandae rem repellendus saepe sed suscipit unde velit.
                    </div>
                    <div class="project-card__files block-description-text">

                    </div>
                    <div class="project-card__commercialization block-description-text truncate" @click="expandText">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A amet aut facilis hic, id illum necessitatibus perspiciatis possimus totam! Ab ad aperiam aspernatur delectus dignissimos expedita mollitia nesciunt non, numquam odit perspiciatis repudiandae velit voluptatibus. Architecto asperiores autem culpa delectus dolorum ducimus eaque eos expedita illum, in incidunt iusto magnam minima molestiae neque nostrum officia officiis saepe sapiente, sit tempore tenetur voluptatem voluptatibus! Ad amet atque beatae cumque dolor doloribus dolorum, ea illum impedit laudantium, molestiae officia optio praesentium quidem, quod repellendus sapiente tempora? Ab dolore eos iusto nemo nesciunt, numquam sit unde vel voluptatem. Consequatur deleniti explicabo hic ipsam iusto maiores nam non, optio rem rerum sed, vel. Consequuntur cum dignissimos dolore, doloribus eius esse excepturi fugit illo impedit natus, nulla perferendis quas quasi quo repellendus tempora voluptatibus. Asperiores assumenda at consequuntur cum debitis delectus dignissimos earum error fuga ipsa iste necessitatibus nesciunt nostrum nulla optio provident, quam quo reiciendis repellendus reprehenderit saepe soluta unde veritatis. Ab at consequatur consequuntur ducimus earum eligendi exercitationem fuga impedit, inventore maiores mollitia necessitatibus officia, placeat praesentium repudiandae sit ut veniam! Aliquam asperiores enim fuga iure magni nostrum, odio omnis qui quo repellendus, similique unde, vitae. Ad cum cupiditate debitis, delectus deserunt dignissimos eligendi, fugiat, mollitia obcaecati quo sequi ullam ut voluptate? Amet architecto aspernatur at doloremque dolorum expedita explicabo fuga, inventore maiores modi nam non nostrum omnis perspiciatis quas quis reiciendis rem sequi totam velit. Asperiores, atque, rem. Adipisci alias amet architecto aspernatur consequatur dolorem ea, enim eos error esse est ex exercitationem facere fuga fugit illo illum impedit inventore minus nesciunt nobis nulla officiis praesentium quasi qui quisquam rem repudiandae rerum sed sit totam veniam voluptatem voluptatum. Animi assumenda debitis dolore ea error eum, exercitationem explicabo facere fugit harum ipsam minima nemo nisi obcaecati officia quo saepe? Corporis perferendis quaerat vel!
                    </div>
                    <div class="card-footer" data-project-id="1810">
                        <div class="card-footer__btn change button-active" @click="toggleChangeModal">Изменить</div>
                        <div class="card-footer__btn remove button-active">Удалить</div>
                    </div>
                </div>
            </tab>
            <tab title="Командные проекты" class="tabs__button">
                Командные проекты
            </tab>
            <tab title="Добавить новый проект" class="tabs__button">
                Добавить новый проект
            </tab>
        </tabs>

        <vodal :show="show" animation="slideLeft" @hide="show=false" :width='600'>
            <form action="" class="project-fill">
                <input type="text" class="project-fill__input" placeholder="наименование" />
                <input type="text" class="project-fill__input" placeholder="отрасль" />
                <input type="text" class="project-fill__input" placeholder="стадия" />
                <textarea class="project-fill__input" placeholder="описание"></textarea>
                <textarea class="project-fill__input" placeholder="коммерциализация"></textarea>
                <div class="card-footer" data-project-id="1810">
                    <input type="submit" class="card-footer__btn change button-active" value="Сохранить">
                </div>
            </form>
        </vodal>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import { Tabs, Tab } from 'vue-slim-tabs';
import Vodal from 'vodal';
export default {
    components: {
        AppLayout,
        JetButton,
        Tabs,
        Tab,
        Vodal
    },
    data() {
        return {
            show: false,
            my_projects: true,
            command_projects: false,
            add_project: false
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
    props: ['data'],
    name: "Index"
}
</script>

<style>
@import "vodal/common.css";
@import "vodal/slide-left.css";
@import '../../../css/projects.css';
</style>
