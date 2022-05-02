import { createApp, h } from "vue";
import { createInertiaApp, Link } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { i18nVue } from "laravel-vue-i18n";

InertiaProgress.init({
    color: 'rgb(79 70 229)',
})

createInertiaApp({
    title: title => `${title} - Yoeri.me`,
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(i18nVue, {
                resolve: lang => import(`../../lang/${lang}.json`),
            })
            .mixin({ methods: { route } })
            .component('Link', Link)
            .mount(el)
    },
})
