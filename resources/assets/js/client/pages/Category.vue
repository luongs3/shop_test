<template>
    <div id="category" class="features_items">
		<h2 class="title text-center">Features Items</h2>
		
		<div class="col-sm-4" v-for="product in products">
			<product-layout :product="product"></product-layout>
		</div>
		<ul class="pagination">
			<li class="active"><a href="">1</a></li>
			<li><a href="">2</a></li>
			<li><a href="">3</a></li>
			<li><a href="">&raquo;</a></li>
		</ul>
    </div>
</template>

<script>
import ProductLayout from 'comps/product/product-layout'

export default {
	props: ['products'],
	components: {
		ProductLayout,
	},
}
</script>

<style>
</style>
