import { createApp, h } from 'vue'
import { createInertiaApp, Link } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from '@inertiajs/progress'

InertiaProgress.init()

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .component('Link', Link)
            .mount(el)
    },
})
