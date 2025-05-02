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
            light: {
                dark: false,
                colors: {
                    background: '#0288D1',           // bold sea blue (deep water)
                    surface: '#E0F7FA',              // light aqua (card backgrounds)
                    'surface-variant': '#B2EBF2',    // a touch deeper (hover/variant)
                    'surface-bright': '#FFFFFF',     // pure white for sharp contrast if needed
                    'on-surface': '#004D40',         // deep teal for text/icons

                    primary: '#4DD0E1',              // turquoise (pops on dark blue)
                    'primary-darken-1': '#26C6DA',   // deeper turquoise (hover)
                    secondary: '#81D4FA',            // sky blue (nice accent)

                    error: '#E53935',
                    success: '#43A047',
                    warning: '#FB8C00',
                    info: '#00ACC1',
                },
            },
        },
    },
    components,
    directives,
})
