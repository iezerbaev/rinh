<template>
    <app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
                            <label v-if="mainActivity !== null">
                                <select v-if="isss" v-model="secondActivity">
                                    <option v-for="value in getValue" :value="value.id">{{ value.name }}</option>
                                </select>
                            </label>
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

export default {
    components: {AppLayout},
    name: "Index",
    data() {
        return {
            items: [],
            activities: JSON.parse(JSON.stringify(scienceData)),
            isAddedModalActive: false,
            mainActivity: null,
            secondActivity: null,
        };
    },
    computed: {
      ass() {
          return this.activities.data[this.mainActivity];
      },
        isss() {
          return 'properties' in getValue();
        }
    },
    methods: {
        getValue() {
            if (this.mainActivity !== null) {
                return this.activities.data[this.mainActivity];
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
