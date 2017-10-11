import Vue from 'vue'
import Router from 'vue-router'
import Home from 'client/pages/Home'
import Main from 'client/pages/Main'
import Category from 'client/pages/Category'
import Product from 'client/pages/Product'
import ErrorDrone from 'client/pages/Error'

export default new Router({
    mode: 'hash',
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
            // not found handler
            path: '*',
            component: ErrorDrone
        }
    ],
    linkActiveClass: 'active',
})
