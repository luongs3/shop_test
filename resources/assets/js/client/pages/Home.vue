<template>
    <div id="home">
        <slider></slider>
        <main-section :data="data"></main-section>
    </div>
</template>

<script>
import Slider from 'comps/slider';
import MainSection from 'comps/main-section';
import {getCategories} from 'api/category';

export default {
    data() {
        return {
            data: {
                categories: null,
            },
        }
    },
    components: {
        Slider,
        MainSection,
    },
    methods: {
        fetchAll (params) {
            getCategories(params).then(({ data }) => {
                this.data.categories = data.categories
            })
        },
    },
    beforeMount () {
        this.fetchAll(this.$route.query)
    }
}
</script>

<style>
</style>
