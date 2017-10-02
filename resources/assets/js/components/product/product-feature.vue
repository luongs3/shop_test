<template>
    <div id="product-feature" class="features_items">
        <h2 class="title text-center">Features Items</h2>
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
            validator: function (products) {
                return products.length
            }
        }
    },
    components: {
        ProductLayout
    }
}
</script>
