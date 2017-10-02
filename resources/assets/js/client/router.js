import Vue from 'vue'
import Router from 'vue-router'
import Home from 'client/pages/Home'
import Category from 'client/pages/Category'
import Categories from 'client/pages/Categories'
import Product from 'client/pages/Product'

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/categories',
            name: 'categories',
            component: Categories
        },
        {
            path: '/categories/:sku',
            name: 'category',
            component: Category
        },
        {
            path: '/products/:sku',
            name: 'product',
            component: Product
        },
    ],
    linkActiveClass: 'active',
})
