<template>
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <router-link :to="`products/${product.sku}`"><img src="images/home/product1.jpg" alt="" /></router-link>
                <router-link :to="`products/${product.sku}`">
                    <h2>{{ product.price }}</h2>
                    <p>{{product.name}}</p>
                </router-link>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            <img v-if="product.sale_off > 0" src="images/home/sale.png" class="new" atl="Sale" />
            <img v-else-if="product.new" src="images/home/new.png" class="new" atl="Sale" />
            <!-- <div class="product-overlay">
                <div class="overlay-content">
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
            </div> -->
        </div>
        <!-- <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
        </div> -->
    </div>
</template>

<script>

export default {
    props: ['product'],
}
</script>

<style>
</style>
