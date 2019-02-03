import Vue from "vue";
import Router from "vue-router";
import { routes } from "../app/index";

Vue.use(Router);

const router = new Router({
    routes: routes
});

//  register beforeEach

export default router;
