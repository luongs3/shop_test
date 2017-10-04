<template>
    <div id="product-feature" class="features_items">
        <h2 class="title text-center">Features Items</h2>
        <div class="col-sm-4" v-for="product in featuredProducts">
            <product-layout :product="product"></product-layout>
        </div>
    </div>
</template>

<script>
import ProductLayout from 'comps/product/product-layout'

export default {
    props: {
        featuredProducts: {
            type: Array,
            // validator: function (featuredProducts) {
            //     return featuredProducts.length
            // }
        }
    },
    components: {
        ProductLayout,
    },
    mounted() {
        console.log('featuredProducts: ', this.featuredProducts);
    }
}
</script>
