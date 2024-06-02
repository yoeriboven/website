import { createApp, h } from "vue";
import { createInertiaApp, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { InertiaProgress } from "@inertiajs/progress";
import { i18nVue } from "laravel-vue-i18n";
import mitt from "mitt";

InertiaProgress.init({
    color: 'rgb(16 185 129)',
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
            .provide('emitter', mitt())
            .mixin({ methods: { route } })
            .component('Link', Link)
            .mount(el)
    },
})

Inertia.on('navigate', (event) => {
  if (window.fathom) {
      window.fathom.trackPageview();
  }
})
