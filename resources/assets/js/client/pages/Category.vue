<template>
    <div id="category-product-list" class="features_items">
		<h2 class="title text-center">List Product</h2>

		<div class="item-list">
            <div class="col-sm-4" v-for="product in products">
    			<product-layout :product="product"></product-layout>
    		</div>
        </div>
        <pagination
        	v-if="pagination"
        	:current-page="pagination.current_page"
        	:last-page="pagination.last_page"
        	:path="$route.path"
        	:query="$route.query"
        ></pagination>
    </div>
</template>

<script>
import ProductLayout from 'comps/product/product-layout'
import Pagination from 'comps/pagination/pagination'
import {getCategory} from 'api/category'

export default {
	data() {
		return {
			products: null,
			category: null,
			pagination: null,
		}
	},
	components: {
		ProductLayout,
        Pagination,
	},
    watch: {
        $route (route, prev) {
            if (route.query !== prev.query) {
                this.fetchData(route.query)
            }
        },
    },
    methods: {
        fetchData(query) {
            getCategory(query, this.$route.params.sku).then(({ data }) => {
                this.category = data.category
                this.products = data.products
                this.pagination = data.pagination
                console.log('this.products', this.products)
                console.log('query', query)
            })
        }
    },
	created() {
        this.fetchData(this.$route.query)
	}
}
</script>

<style>

</style>
