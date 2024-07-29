<template>
    <q-card :style="{ width: small ? '250px' : '400px' }">
        <q-card-section>
            <canvas ref="canvas"></canvas>
        </q-card-section>
    </q-card>
</template>

<script>
import { ref, onMounted } from 'vue';
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
    BarController
} from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, BarController);

export default {
    props: {
        chartData: {
            type: Array,
            required: true
        },
        topPerformers: {
            type: Boolean,
            default: false
        }
    },
    setup(props) {
        const canvas = ref(null);

        onMounted(() => {
            const ctx = canvas.value.getContext('2d');
            let labels = [];
            let data = [];
            let label = '';

            if (props.topPerformers) {
                labels = props.chartData.map(item => item.name);
                data = props.chartData.map(item => item.emotional_intelligence);
                label = 'Emotional Intelligence'
            } else {
                labels = props.chartData.map(item => item.label);
                data = props.chartData.map(item => item.total);
                label = 'Total'
            }

            new ChartJS(ctx, {
                type: 'bar',
                data: {
                    labels,
                    datasets: [{
                        label: label,
                        data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

        return {
            canvas
        };
    }
};
</script>
