<template>
    <div id="home">
        <my-header></my-header>
        <slider></slider>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <!-- left sidebar -->
                        <left-sidebar :categories="categories"></left-sidebar>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <!-- main content -->
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </section>
        <my-footer></my-footer>
    </div>
</template>

<script>
import MyHeader from 'comps/header';
import Slider from 'comps/slider'
import LeftSidebar from 'comps/left-sidebar'
import MyFooter from 'comps/footer'
import {getCategories} from 'api/category'

export default {
    data() {
        return {
            categories: null,
        }
    },
    components: {
        MyHeader,
        Slider,
        MyFooter,
        LeftSidebar,
    },
    created () {
        getCategories(this.$route.query).then(({ data }) => {
            this.categories = data.categories
        })
    }
}
</script>

<style>
</style>
