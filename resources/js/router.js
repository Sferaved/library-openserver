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
    },
    {
        name: 'update',
        path: '/vue/users/:id'
    },
    {
        name: 'updateBook',
        path: '/vue/books/:id'
    }
    ];

    export default new vueRouter({
        mode: "history",
        routes
    })
