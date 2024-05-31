import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { createPinia } from 'pinia';
import PrimeVue from 'primevue/config'; // Import PrimeVue
import 'primevue/resources/themes/aura-light-green/theme.css'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import ToastService from 'primevue/toastservice';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const pinia = createPinia();
        const app = createApp({ render: () => h(App, props) });
        
        // Configure and use PrimeVue
        app.use(PrimeVue, {
            unstyled: false,
        });

        return app
            .component('QuillEditor', QuillEditor)
            .use(plugin)
            .use(ZiggyVue)
            .use(pinia)
            .use(Toast)
            .use(ToastService)
            .mount(el);

    },
    progress: {
        color: '#F59321',
    },
});
