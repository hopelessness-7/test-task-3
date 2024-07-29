<template>
    <div class="row justify-center">
        <div class="col-md-6 col-sm-12 q-pa-md">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div v-if="charts.gender.length">
                        <div class="text-h4">Пол: мужчины и женщины</div>
                        <bar-chart :chart-data="charts.gender" :small="true"></bar-chart>
                    </div>
                    <div v-if="charts.age.length">
                        <div class="text-h4">Возраст</div>
                        <bar-chart :chart-data="charts.age" :small="true"></bar-chart>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div v-if="charts.city.length">
                        <div class="text-h4">Город</div>
                        <bar-chart :chart-data="charts.city" :small="true"></bar-chart>
                    </div>
                    <div v-if="charts.top_performers.length">
                        <div class="text-h4">Лучшие показатели</div>
                        <bar-chart :chart-data="charts.top_performers" :top-performers="true" :small="true"></bar-chart>
                    </div>
                </div>
            </div>
            <q-btn label="Сгенерировать" @click="generateData" color="primary" class="full-width q-mt-md"></q-btn>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';
import BarChart from './BarChart.vue';

export default {
    components: {
        BarChart
    },
    setup() {
        const charts = ref({
            gender: [],
            age: [],
            city: [],
            top_performers: []
        });

        const generateData = async () => {
            if (!Object.keys(charts.value).every(key => charts.value[key].length === 0)) {
                location.reload();
            }
            const response = await axios.get('/api/v1/generate-chart-data');
            charts.value = response.data;
        };

        return {
            charts,
            generateData
        };
    }
};
</script>
