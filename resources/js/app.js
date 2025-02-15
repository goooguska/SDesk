import { createInertiaApp, router } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createPinia } from 'pinia';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import '../css/app.css';
import './bootstrap';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${appName} - ${title}`,
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        const pagePath = `./Pages/${name}.vue`;

        if (!pages[pagePath]) {
            return pages['./Pages/Errors/NotFound.vue'];
        }

        return resolvePageComponent(`./Pages/${name}.vue`, pages);
    },
    setup({ el, App, props, plugin }) {
        const pinia = createPinia();
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(pinia)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: false,
}).then((app) => {
    router.on('error', (error) => {
        if (error.response?.status === 404) {
            router.visit(route('404'), {
                preserveScroll: true,
                replace: true,
            });
        }
    });

    return app;
});
