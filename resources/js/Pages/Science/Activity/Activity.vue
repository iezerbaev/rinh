<template>
    <app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <button type="button">Добавить</button>
                        <div v-if="isAddedModalActive">
                            <label>
                                <select name="activity" ref="main" >
                                    <option v-for="activity in activities" :key="item.id" :value="activity.id">
                                        {{ activity.name }}
                                    </option>
                                </select>
                            </label>

                            <label>
                                Значение
                                <input name="value" type="text"/>
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
            isAddedModalActive: false
        };
    },
    watch: {

    },
    computed: {
        getMainValue() {
            return this.activities[this.$refs.main.value];
        }
    },
    methods: {
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
