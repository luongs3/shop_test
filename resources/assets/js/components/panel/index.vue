<template>
    <div id="my-panel">
        <div class="panel-list" v-if="categories.length" v-for="category in categories">
            <panel-multiple v-if="category.descendants.length" :category="category"></panel-multiple>
            <panel-one v-else :category="category"></panel-one>
        </div>
    </div>
</template>

<script>
import PanelMultiple from 'comps/panel/panel-multiple'
import PanelOne from 'comps/panel/panel-one-line'

export default {
    props: {
        categories: Array
    },
    components: {
        PanelMultiple,
        PanelOne,
    }
}
</script>
