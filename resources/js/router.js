import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Index from './views/Index';
import Test from './views/Test';

const  routes = [
    {
        path: "/booksv",
        component: Index
    },
    {
        path: "/booksv/test",
        component: Test
    }
    ];

    export default new vueRouter({
        mode: "history",
        routes
    })
