<template>
    <div id="product-detail">
    	<product-detail v-if="product" :product="product" />
    	<product-slider :products="recommendedProducts"></product-slider>
    </div>
</template>

<script>
import {getProduct, getRecommendedProducts} from 'api/product'
import ProductDetail from 'comps/product/product-detail/product-detail'
import ProductSlider from 'comps/product/slider'

export default {
	data() {
		return {
			product: null,
			recommendedProducts: null,
		}
	},
	components: {
		ProductDetail,
		ProductSlider,
	},
	created() {
		getProduct(this.$route.params.sku).then(({ data }) => {
            this.product = data.product
        })
        getRecommendedProducts(this.$route.params).then(({ data }) => {
	        this.recommendedProducts = data.recommendedProducts
        })
	}
}
</script>

<style>
</style>
