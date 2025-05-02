<template>
    <v-card elevation="4" rounded="xl" class="mb-4 bg-surface">
        <v-card-title class="text-h6 font-weight-bold">Start Sail</v-card-title>

        <v-card-text>
            <p>Copy the following code and paste it into your terminal:</p>

            <div class="position-relative pt-8">
                <v-btn
                    icon="mdi-content-copy"
                    class="position-absolute top-0 right-0 ma-2 copyButton"
                    color='primary'
                    @click="copyCode"
                    size="small"
                />
                
                <pre class="overflow-x-auto text-body-2 rounded-lg pa-4"><code>{{ props.code }}</code></pre>
            </div>

            <v-snackbar v-model="snackbar.show" :color="snackbar.color" :timeout="snackbar.timeout">
                {{ snackbar.message }}
            </v-snackbar>
        </v-card-text>
    </v-card>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useTheme } from 'vuetify'

const props = defineProps({
    code: {
        type: String,
        required: true
    }
})

const snackbar = ref({
    color: '',
    message: '',
    show: false,
    timeout: 2000,
})

async function copyCode() {
    try {
        await navigator.clipboard.writeText(props.code)
        snackbar.value.color = 'success'
        snackbar.value.message = 'Copied to clipboard!'
    } catch (err) {
        console.log(err)
        snackbar.value.color = 'error'
        snackbar.value.message = 'Failed to copy!'
    }
    finally{
        snackbar.value.show = true
    }
}
</script>

<style scoped>
    pre {
        background: #263238;
        color: #ECEFF1;
        font-family: 'Fira Mono', monospace;
        border-radius: 8px;
    }
    .copyButton
    {
        z-index: 999999999 !important;
    }
</style>