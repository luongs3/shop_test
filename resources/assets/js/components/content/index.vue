<template>
    <div id="main-content">
        <featured-products :products="featuredProducts"></featured-products>
        <featured-categories :featured-categories="featuredCategories"></featured-categories>
        <product-slider :products="recommendedProducts"></product-slider>
    </div>
</template>

<script>
    import FeaturedProducts from 'comps/product/grid6'
    import FeaturedCategories from 'comps/category/category-feature'
    import ProductSlider from 'comps/product/slider'

    export default {
        props: [
            'featuredProducts',
            'featuredCategories',
            'recommendedProducts',
        ],
        components: {
            FeaturedProducts,
            FeaturedCategories,
            ProductSlider,
        }
    }
</script>
