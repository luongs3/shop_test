<template>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <!-- left sidebar -->
                <left-sidebar :categories="data.categories"></left-sidebar>
            </div>

            <div class="col-sm-9 padding-right">
                <!-- main content -->
                <main-content :featured-products="data.featuredProducts"></main-content>
            </div>
        </div>
    </div>
</section>
</template>

<script>
    import LeftSidebar from 'comps/left-sidebar'
    import MainContent from 'comps/content'

    export default {
        props: {
            data: Object,
        },
        components: {
            LeftSidebar,
            MainContent,
        }
    }
</script>
