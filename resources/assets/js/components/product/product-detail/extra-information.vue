<template>
<div id="product-extra-information" class="category-tab shop-details-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li><a href="#details" data-toggle="tab">Details</a></li>
            <li><a href="#tag" data-toggle="tab">Tag</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="details" >
            <p v-if="product.information">{{ product.information }}</p>
        </div>
        
        <div class="tab-pane fade" id="tag" >
            Tags Of Product
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
