<template>
    <div id="left-sidebar" class="left-sidebar">
        <menu-category v-if="categories && categories.length" :categories="categories"></menu-category>
    </div>
</template>

<script>
    import MenuCategory from './menu-category';

    export default {
        props: {
            categories: Array,
            brand: Array,
        },
        components: {
            MenuCategory,
        }
    }
</script>
