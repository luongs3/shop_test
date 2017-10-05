<template>
    <div id="home">
        <slider></slider>
        <main-section :data="data"></main-section>
    </div>
</template>

<script>
import Slider from 'comps/slider';
import MainSection from 'comps/main-section';
import {getCategories, getFeaturedCategories} from 'api/category';
import {getFeaturedProducts, getRecommendedProducts} from 'api/product';

export default {
    data() {
        return {
            data: {
                categories: null,
                featuredProducts: null,
                featuredCategories: null,
                recommendedProducts: null,
            },
        }
    },
    components: {
        Slider,
        MainSection,
    },
    methods: {
        fetchAll (params) {
            getCategories(params).then(({ data }) => {
                this.data.categories = data.categories
            })
            getFeaturedProducts(params).then(({ data }) => {
                this.data.featuredProducts = data.featuredProducts
            })
            getRecommendedProducts(params).then(({ data }) => {
                this.data.recommendedProducts = data.recommendedProducts
            })
            getFeaturedCategories(params).then(({ data }) => {
                this.data.featuredCategories = data.featuredCategories
            })
        },
    },
    created () {
        this.fetchAll(this.$route.query)
        console.log('this.data: ', this.data);
    }
}
</script>

<style>
</style>
