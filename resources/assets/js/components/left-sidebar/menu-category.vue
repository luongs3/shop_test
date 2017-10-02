<template>
    <div id="menu-category">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <my-panel :categories="categories"></my-panel>
        </div>
    </div>
</template>

<script>
    import MyPanel from 'comps/panel/'

    export default {
        props: {
            categories: Array
        },
        components: {
            MyPanel,
        }
    }
</script>
