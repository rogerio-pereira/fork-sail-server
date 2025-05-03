<template>
    <v-container class="page-container mt-8">
        <v-row justify="center" class="my-6">
            <v-col cols="12" sm="6" md="4" lg="3">
                <v-card class="pa-4 mx-2 my-2 text-center" elevation="6" rounded="xl" style="min-width: 220px">
                    <v-icon color="primary" size="30" class="mb-2">mdi-download</v-icon>

                    <h3 class="text-h6 mb-2">Downloads All</h3>

                    <div class="text-h5 font-weight-bold">{{ props.total }}</div>
                </v-card>
            </v-col>

            <v-col cols="12" sm="6" md="4" lg="3">
                <v-card class="pa-4 mx-2 my-2 text-center" elevation="6" rounded="xl" style="min-width: 220px">
                    <v-icon color="primary" size="30" class="mb-2">mdi-download</v-icon>

                    <h3 class="text-h6 mb-2">Downloads Year</h3>

                    <div class="text-h5 font-weight-bold">{{ props.totalYear }}</div>
                </v-card>
            </v-col>

            <v-col cols="12" sm="6" md="4" lg="3">
                <v-card class="pa-4 mx-2 my-2 text-center" elevation="6" rounded="xl" style="min-width: 220px">
                    <v-icon color="primary" size="30" class="mb-2">mdi-download</v-icon>

                    <h3 class="text-h6 mb-2">Downloads Month</h3>

                    <div class="text-h5 font-weight-bold">{{ props.totalMonth }}</div>
                </v-card>
            </v-col>
        </v-row>

        <v-row>
            <v-col>
                <v-card
                    class="mt-8 mx-auto overflow-visible"
                    max-width="900"
                    elevation="6"
                    rounded="xl" 
                >
                    <v-sheet
                        class="v-sheet--offset mx-auto px-10 py-6"
                        color="white"
                        elevation="12"
                        max-width="calc(100% - 32px)"
                        rounded="xl" 
                    >
                        <line-chart :labels='labels' :data='downloadCount' />
                    </v-sheet>

                    <v-card-text class="pt-0">
                        <div class="text-h6 font-weight-light mb-2">
                            Downloads in last month
                        </div>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script setup>
    import { defineProps, computed } from 'vue'
    import LineChart from '../components/LineChart.vue'

    const props = defineProps({
        total: {
            type: Number,
            required: true,
            default: 0,
        },
        totalYear: {
            type: Number,
            required: true,
            default: 0,
        },
        totalMonth: {
            type: Number,
            required: true,
            default: 0,
        },
        downloads: {
            type: Array,
            required: true,
            default: [],
        },
    })

    const labels = computed(() => {
            let labels = []

            for(const item of props.downloads) {
                labels.push(item.date)
            }

            return labels
        })

    const downloadCount = computed(() => {
            let downloads = []

            for(const item of props.downloads) {
                downloads.push(item.downloads)
            }

            return downloads
        })
</script>

<style scoped>
    .v-sheet--offset {
        top: -24px;
        position: relative;
    }
</style>