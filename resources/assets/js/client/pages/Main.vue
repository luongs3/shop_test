<template>
    <div id="main">
        <!-- main content -->
        <main-content
            :featured-products="featuredProducts"
            :featured-categories="featuredCategories"
            :recommended-products="recommendedProducts"
        ></main-content>
    </div>
</template>

<script>
import MainContent from 'comps/content'
import {getFeaturedCategories} from 'api/category'
import {getFeaturedProducts, getRecommendedProducts} from 'api/product'

export default {
    data() {
        return {
            featuredProducts: null,
            featuredCategories: null,
            recommendedProducts: null,
        }
    },
    components: {
        MainContent,
    },
    methods: {
        fetchAll (params) {
            getFeaturedProducts(params).then(({ data }) => {
                this.featuredProducts = data.featuredProducts
            })
            getRecommendedProducts(params).then(({ data }) => {
                this.recommendedProducts = data.recommendedProducts
            })
            getFeaturedCategories(params).then(({ data }) => {
                this.featuredCategories = data.featuredCategories
            })
        },
    },
    created () {
        this.fetchAll(this.$route.query)
    }
}
</script>
