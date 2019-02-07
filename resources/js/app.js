import router from "./router";
import store from "./vuex";
import localforage from "localforage";

localforage.config({
    driver: localforage.LOCALSTORAGE,
    storeName: "laravueboilerplate"
});

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("app", require("./components/App.vue").default);
Vue.component("navigation", require("./components/Navigation.vue").default);

// check token if exist in store
store
    .dispatch("auth/setToken")
    .then(() => {
        store.dispatch("auth/fetchUser").catch(() => {
            // clear auth token if invalid
            store.dispatch("auth/clearAuth");
            router.replace({ name: "login" });
        });
    })
    .catch(() => {
        store.dispatch("auth/clearAuth");
    });

const app = new Vue({
    el: "#app",
    router: router,
    store: store
});
