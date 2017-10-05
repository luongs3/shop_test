<template>
    <div :id="idFromTitle" class="features_items">
        <h2 class="title text-center">{{ title }}</h2>
        <div class="col-sm-4" v-for="product in products">
            <product-layout :product="product"></product-layout>
        </div>
    </div>
</template>

<script>
import ProductLayout from 'comps/product/product-layout'

export default {
    props: {
        products: {
            type: Array,
        },
        title: {
            type: String,
            default: 'Featured Products'
        },
    },
    components: {
        ProductLayout,
    },
    computed: {
        idFromTitle() {
            return this.title.toLowerCase().split(' ').join('-')
        }
    }
}
</script>
