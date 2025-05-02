<template>
    <v-app class="bg-background">
        <v-app-bar color="#01579B" dark flat>
            <v-toolbar-title class="app-title">Laravel Sailor</v-toolbar-title>
        </v-app-bar>

        <v-main>
            <slot /> <!-- Injects content from child pages -->

            <waves />
        </v-main>

        <v-footer
            color="surface"
            padless
            class="mt-4"
        >
            <v-row class="text-center py-4 text-caption text-on-surface">
                <v-col>
                    <p>
                        © 2025 Laravel Sailor. 
                        Forked from <a href='https://github.com/laravel/sail-server' target="_blank">laravel/sail-server</a><br/>
                        Not affiliated with Laravel or Taylor Otwell.<br/>
                    </p>
                    <br />
                    <a href="https://github.com/rogerio-pereira/laravel-sailor" target="_blank">
                        <v-btn icon="mdi-github" color='primary'>
                        </v-btn>
                    </a>
                </v-col>
            </v-row>
        </v-footer>

    </v-app>
</template>

<script setup>
    import Waves from './components/Waves.vue'
</script>
