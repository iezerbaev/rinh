<template>
    <app-layout>
        <div class="">
            <div class="">
                <div class="">
                    <div>
                        <button type="button" @click.prevent="isAddedModalActive = true">Добавить</button>
                        <div v-if="isAddedModalActive">
                            <label>
                                Выберите конкретную тематику
                                <select v-model="mainActivity" ref="activityMain">
                                    <option v-for="item in activities.data" :key="item.id" :value="item.id">
                                        {{ item.name }}
                                    </option>
                                </select>
                            </label>
                            <div v-if="mainActivity !== null">
                                <label v-if="isActivities">
                                    <select v-model="secondActivity">
                                        <option v-for="value in this.getActivities()" :value="value.id">
                                            {{ value.name }}
                                        </option>
                                    </select>
                                </label>
                                <div v-if="secondActivity !== null || !isActivities">
                                    <input v-model="value" type="text">
                                    <button @click="onSaveHandler">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p v-if="items.length <= 0">
                            Список научино-исследователськой деятельности пуст
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import scienceData from "@/Data/Science/data.json";
import Button from "@/Jetstream/Button";

export default {
    components: {Button, AppLayout},
    name: "Index",
    data() {
        return {
            items: [],
            activities: JSON.parse(JSON.stringify(scienceData)),
            isAddedModalActive: false,
            mainActivity: null,
            secondActivity: null,
            value: null
        };
    },
    computed: {
        isActivities() {
            return ('properties' in this.activities.data[this.mainActivity]);
        }
    },
    methods: {
        getActivities() {
            if (this.mainActivity !== null && this.isActivities) {
                return this.activities.data[this.mainActivity].properties;
            }
            return {};
        },
        onAddHandler(event) {
            this.isAddedModalActive = true;
        },
        onSaveHandler(event) {
            this.isAddedModalActive = false;
        }
    }
}
</script>

<style scoped>

</style>
