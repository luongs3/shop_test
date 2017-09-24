import Vue from 'vue'
import Router from 'vue-router'
import Example from 'comps/Example'

export default new Router({
    routes: [
        {
            path: '/example',
            name: 'Example',
            component: Example
        }
    ]
})
