<template>
<div>
    <div class="product-details">
        <div class="col-sm-5">
            <images :product="product" />
        </div>
        <div class="col-sm-7">
            <Description :product="product" />
        </div>
    </div>
    <ExtraInformation :product="product" />
</div>
</template>

<script>
import Images from './images'
import Description from './description'
import ExtraInformation from './extra-information'

export default {
    props: ['product'],
    components: {
        Images,
        ExtraInformation,
        Description,
    }
}
</script>

<style>
</style>
