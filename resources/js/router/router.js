import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)



export default new VueRouter({
    routes: [
        {
            path: '/login',
            name: 'login',
            component: Vue.component('login', require('../views/login/login.vue').default)
        }
    ]
});

