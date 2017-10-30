// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import 'assets/bootstrap'
import App from 'client/App'
import router from 'client/router'
import store from 'assets/store/store'

Vue.config.productionTip = false

/* eslint-disable no-new */
store.dispatch('auth/fetchMe')

new Vue({
    el: '#app',
    router,
    store,
    template: '<App/>',
    components: { App }
})
