import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import vuetify from './plugins/vuetify'
import AppLayout from './App.vue'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({
        render: () =>
            h(AppLayout, null, {
                default: () => h(App, props),
            }),
    })
    .use(plugin)
    .use(vuetify)
    .mount(el)
},
})