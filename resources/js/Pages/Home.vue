<template>
    <v-container class="page-container mt-8">
        <v-card elevation="4" rounded="xl" class="mb-4">
            <v-card-title class="text-h6 font-weight-bold">Mandatory Fields</v-card-title>

            <v-card-text>
                <v-text-field
                    label="Application name"
                    variant="filled"
                    v-model='appName'
                    density="compact"
                />

                <v-select
                    chips
                    label="Services"
                    :items="services"
                    v-model='selectedServices'
                    variant="filled"
                    density="compact"
                    multiple
                />
            </v-card-text>
        </v-card>

        <v-card elevation="4" rounded="xl" class="mb-4">
            <v-card-title class="text-h6 font-weight-bold">Optional Fields</v-card-title>

            <v-card-text>
                <v-row>
                    <v-col cols='12' sm='6' md='4'>
                        <v-select
                            chips
                            label="Frontend"
                            :items="frontend"
                            v-model='selectedFrontend'
                            variant="filled"
                            density="compact"
                        />
                    </v-col>

                    <v-col cols='12' sm='6' md='4'>
                        <v-select
                            chips
                            label="TestingFramework"
                            :items="testingFramework"
                            v-model='selectedTesting'
                            variant="filled"
                            density="compact"
                        />
                    </v-col>

                    <v-col cols='12' sm='6' md='4'>
                        <v-select
                            chips
                            label="Auth Provider"
                            :items="authProvider"
                            v-model='selectedAuth'
                            variant="filled"
                            density="compact"
                        />
                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>

        <code-block :code='command' />
    </v-container>
</template>

<script setup>
    import { ref,computed } from 'vue'
    import { usePage } from '@inertiajs/vue3'
    import CodeBlock from '../components/CodeBlock.vue'

    const page = usePage()
    const url = computed(() => page.props.url ) //Shared from HomeController

    const appName = ref('Laravel')
    const selectedServices = ref([
        'pgsql',
        'redis',
        'meilisearch',
        'minio',
        'mailpit',
        'selenium'
    ])
    const selectedFrontend = ref('livewire')
    const selectedAuth = ref('laravel')
    const selectedTesting = ref('pest')

    //Select Boxes items
    const services = ref([
        'mysql',
        'pgsql',
        'mariadb',
        'mongodb',
        'redis',
        'rabbitmq',
        'valkey',
        'memcached',
        'meilisearch',
        'typesense',
        'minio',
        'mailpit',
        'selenium',
        'soketi',
    ])
    const frontend = ref([
        'livewire',
        'livewire-class-components',
        'vue',
        'react',
    ])
    const authProvider = ref([
        'laravel',
        'workos',
    ])
    const testingFramework = ref([
        'pest',
        'phpunit',
    ])


    const command = computed(() => {
        const url = window.location.href+appName.value
        const services = '?with='+selectedServices.value.join(',')
        const frontend = '&frontend='+selectedFrontend.value
        const testing = '&testing='+selectedTesting.value
        let auth = ''

        if(selectedAuth.value !== 'laravel') {
            auth = '&auth='+selectedAuth.value
        }

        const command = "curl -s '"+url+services+frontend+testing+auth+"' | bash"

        return command
    })
</script>

<style scoped>
    .page-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 16px;
    }
</style>