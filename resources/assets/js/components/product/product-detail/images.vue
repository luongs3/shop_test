<template>
    <div id="product-detail-image" class="product-detail-image">
        <div class="view-product">
            <img :src="product.image" alt="" />
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active" v-if="product.extra_images.length > 0" v-for="extraImage in product.extra_images">
                    <a href=""><img :src="extraImage" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: ['product'],
}
</script>

<style>
</style>
