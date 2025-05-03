<template>
    <Line :data="chartData" :options="chartOptions" />
</template>

<script setup>
import { defineProps } from 'vue'
import { Line } from 'vue-chartjs'
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
} from 'chart.js'

// Register what you need
ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
)

const props = defineProps({
    labels: {
        type: Array,
        required: true,
        default: () => [],
    },
    data: {
        type: Array,
        required: true,
        default: () => [],
    },
})

const chartData = {
    labels: props.labels,
    datasets: [
        {
            backgroundColor: '#01579B',
            borderColor: '#42A5F5',             // Line color
            data: props.data,
            tension: 0.4,                       // Smooth line
            fill: false,
            pointBackgroundColor: '#01579B',    // Bullet color
        },
    ],
}

const chartOptions = {
    responsive: true,
    plugins: {
        legend: {
            display: false,
        },
        title: {
            display: false,
        },
    },
    scales: {
        x: {
            display: false,
        },
    },
    animation: {
        duration: 500,
        easing: 'easeInOutCubic',
        delay: function (context) {
            const index = context.dataIndex;
            return index * 40;
        },
    }
}
</script>

<style scoped></style>
