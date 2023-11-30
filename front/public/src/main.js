import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'

import { languages } from "./i18n"
import { defaultLocale } from "./i18n"
import { createI18n, useI18n } from 'vue-i18n'

const localStorageLang = localStorage.lang
const messages = Object.assign(languages)
const i18n = createI18n({
    legacy: false,
    locale: localStorageLang || defaultLocale,
    fallbackLocale: 'ua',
    messages
})

const app = createApp(App, {
    setup() {
       const {t} = useI18n() 
       return {t}
    }
})
app.use(i18n)
app.use(VueAxios, axios)
app.use(createPinia())
app.use(router)

app.mount('#app')
