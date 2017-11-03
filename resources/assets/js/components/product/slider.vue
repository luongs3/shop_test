<template>
    <div :id="idFromTitle" class="recommended_items">
        <h2 class="title text-center">{{ title }}</h2>
		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="col-sm-4" v-for="product in productPart1">
						<product-layout :product="product"></product-layout>
					</div>
				</div>

				<div class="item">
					<div class="col-sm-4" v-for="product in productPart2">
						<product-layout :product="product"></product-layout>
					</div>
				</div>
			</div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
	    </div>
	</div><!--/recommended_items-->
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
            default: 'RECOMMENDED PRODUCTS'
        },
    },
    components: {
        ProductLayout,
    },
    computed: {
        idFromTitle() {
            return this.title.toLowerCase().split(' ').join('-')
        },
        productPart1() {
            return this.products ? this.products.slice(0, 3): null
        },
        productPart2() {
            return this.products ? this.products.slice(3): null
        },
    }
}
</script>
