import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'

import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import colors from 'vuetify/util/colors' // ✅ Import Vuetify Colors

export default createVuetify({
    theme: {
        defaultTheme: 'light',
        themes: {
            dark: {
                dark: true,
                colors: {
                    background:         '#12181B',
                    surface:            '#1C252B',
                    'surface-variant':  '#263238',
                    'surface-bright':   '#B0BEC5',
                    'on-surface':       '#B0BEC5',
                    primary:            '#455A64',
                    'primary-darken-1': '#90A4AE',
                    secondary:          '#78909C',
                    error:              '#FF5252',
                    success:            '#4CAF50',
                    warning:            '#FFC107',
                    info:               '#29B6F6',
                },
            },
        },
    },
    components,
    directives,
})
