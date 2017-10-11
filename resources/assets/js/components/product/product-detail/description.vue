<template>
    <div id="product-detail-description" class="product-information"><!--/product-information-->
        <img src="images/product-details/new.jpg" class="newarrival" alt="" />
        <h2>{{ product.name }}</h2>
        <p>Product SKU: {{ product.sku }}</p>
        <div>
            <span>
                <div v-if="product.sale_price">
                    <div class="sale_line">
                        <span class="price">{{ product.sale_price }} đ</span>
                        <span class="label label-warning">-{{ product.ratio }}%</span>
                    </div>
                    <span class="price sale_price">{{ product.price }} đ</span>
                </div>
                <span v-else class="price">{{ product.price }} đ</span>

                <label>Quantity:</label>
                <input type="text" value="3" />
            </span>
            <div>
                <button type="button" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                </button>
            </div>
        </div>
        <p><b>Availability:</b> In Stock</p>
        <p><b>Condition:</b> New</p>
        <p><b>Brand:</b> E-SHOPPER</p>
        <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
    </div><!--/product-information-->
</template>

<script>

export default {
    props: ['product'],
}
</script>

<style>
    button.cart {
        margin: 0 0 10px 0;
    }
</style>
