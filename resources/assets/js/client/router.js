import Vue from 'vue'
import Router from 'vue-router'
import Home from 'client/layout/home'
import HeaderLayout from 'client/layout/header_layout'
import Main from 'client/pages/Main'
import Category from 'client/pages/Category'
import Product from 'client/pages/Product'
import ErrorDrone from 'client/pages/Error'
import Login from 'client/pages/Login'
import Register from 'client/pages/Register'
import store from 'assets/store/store'

export default new Router({
    mode: 'hash',
    // mode: 'history',
    routes: [
        {
            path: '/404',
            component: ErrorDrone,
        },
        {
            path: '/',
            component: Home,
            children: [{
                    path: '',
                    name: 'main',
                    component: Main,
                },{
                    path: '/categories/:sku',
                    name: 'category',
                    component: Category
                },{
                    path: '/products/:sku',
                    name: 'product',
                    component: Product
                },
            ],
        },{
            path: '/a',
            component: HeaderLayout,
            children: [{
                    path: 'login',
                    name: 'login',
                    component: Login,
                    beforeEnter(to, from, next) {
                        if (store.getters["auth/authenticated"]) {
                            this.$router.push('/')
                        }
                        next()
                    }
                },{
                    path: 'register',
                    name: 'register',
                    component: Register,
                },
            ],
        },{
            // not found handler
            path: '*',
            component: ErrorDrone
        }
    ],
    linkActiveClass: 'active',
})
