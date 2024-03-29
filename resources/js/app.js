import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import "./bootstrap";
import "bootstrap/dist/js/bootstrap.bundle";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    title: (title) =>
        title ? `${title} - CRUD Laravel Vue` : "CRUD Laravel Vue",
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});
