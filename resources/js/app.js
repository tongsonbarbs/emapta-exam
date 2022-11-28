import './bootstrap';
import '../css/app.scss';

import { createApp } from 'vue'
import App from './components/App.vue'
import ErrorMessage from './components/ErrorMessage.vue'

const app = createApp(App)
app.use(router)
app.component('ErrorMessage', ErrorMessage)
app.mount("#app")