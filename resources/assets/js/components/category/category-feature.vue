<template>
<div id="category-feature" class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li v-for="(featuredCategory, index) in featuredCategories" @click="changeSelectedCategory(featuredCategory)" :class="isActive(index)">
                <router-link :to="`#${featuredCategory.sku}`" data-toggle="tab">{{featuredCategory.name}}</router-link>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div v-for="(featuredCategory, index) in featuredCategories" :class="'tab-pane fade in ' + isActive(index)" :id="`${featuredCategory.sku}`" >
            <div v-if="featuredCategory.chunk_products.length > 0" v-for="product in featuredCategory.chunk_products"  :key="product.id" class="col-sm-3">
                <product-layout :product="product"></product-layout>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import ProductLayout from 'comps/product/product-layout'

export default {
    data() {
        return {
            lastSelectedCategorySku: null,
        }
    },
    methods: {
        isActive(index) {
            return (index == 0) ? 'active' : ''
        },
        addPropertyToSelectedCategory(selectedCategory) {
            let tabContent = document.querySelector(`#category-feature #${selectedCategory.sku}`)
            tabContent.setAttribute('class', 'tab-pane fade in active')
        },
        removePropertyToLastSelectedCategory() {
            let lastTabContent = document.querySelector(`#category-feature #${this.lastSelectedCategorySku}`);
            lastTabContent.setAttribute('class', 'tab-pane fade in');
        },
        changeSelectedCategory(selectedCategory) {
            this.addPropertyToSelectedCategory(selectedCategory);
            this.removePropertyToLastSelectedCategory();
            this.lastSelectedCategorySku = selectedCategory.sku;
        },
    },
    props: ['featuredCategories'],
    components: {
        ProductLayout,
    },
    updated() {
        this.lastSelectedCategorySku = this.featuredCategories[0].sku
    }
}
</script>
