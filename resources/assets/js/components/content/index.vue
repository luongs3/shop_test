<template>
    <div id="main-content">
        <featured-products :featured-products="featuredProducts"></featured-products>
    </div>
</template>

<script>
    import FeaturedProducts from 'comps/product/product-feature'

    export default {
        props: {
            featuredProducts: {
                type: Array,
                // validator (value) {
                //     return value.length > 0
                // }
            },
        },
        components: {
            FeaturedProducts,
        },

        updated() {
            console.log('content: featuredProducts: ', this.featuredProducts);
        }
    }
</script>
