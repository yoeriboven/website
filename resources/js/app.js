import { createApp, h } from "vue";
import { createInertiaApp, Link, router } from "@inertiajs/vue3";
import { i18nVue } from "laravel-vue-i18n";
import mitt from "mitt";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

createInertiaApp({
    title: title => `${title} - Yoeri.me`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(i18nVue, {
                resolve: lang => import(`../../lang/${lang}.json`),
            })
            .provide('emitter', mitt())
            .mixin({ methods: { route } })
            .component('Link', Link)
            .mount(el)
    },
    progress: {
        color: 'rgb(16 185 129)',
    },
})

router.on('navigate', () => {
    if (window.fathom) {
        window.fathom.trackPageview();
    }
})
