import { createApp } from 'vue';
import App from './App.vue';
import { createRouter, createWebHistory } from 'vue-router';
import { Quasar, QCard, QCardSection, QBtn, QInput, QAvatar, QBadge, QSeparator, QList, QItem, QRadio, QForm, QDialog } from 'quasar';
import quasarUserOptions from './quasar-user-options';

import 'quasar/dist/quasar.css';

import Chart from './components/ChartComponent.vue';

const routes = [
    { path: '/chart', component: Chart },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

const app = createApp(App);
app.use(router);
app.use(Quasar, {
    components: {
        QCard,
        QCardSection,
        QBtn,
        QInput,
        QAvatar,
        QBadge,
        QSeparator,
        QList,
        QItem,
        QRadio,
        QForm,
        QDialog
    },
    ...quasarUserOptions
});
app.mount('#app');
