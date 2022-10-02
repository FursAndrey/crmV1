import { createRouter, createWebHistory } from 'vue-router';
import home from '../pages/home.vue';
import userList from '../pages/userList.vue';
import userPage from '../pages/userPage.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: home
        },
        {
            path: '/users',
            name: 'userList',
            component: userList
        },
        {
            path: '/users/:id',
            name: 'userPage',
            component: userPage
        },
    ]
})

export default router
