import { createApp, h } from "vue";
import { createInertiaApp, Link } from "@inertiajs/vue3";
import { i18nVue } from "laravel-vue-i18n";
import mitt from "mitt";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

// InertiaProgress.init({
//     color: 'rgb(16 185 129)',
// })


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
    // progress: {
    //     color: '#4B5563',
    // },
})

// Inertia.on('navigate', (event) => {
//     if (window.fathom) {
//       window.fathom.trackPageview();
//     }
// })
