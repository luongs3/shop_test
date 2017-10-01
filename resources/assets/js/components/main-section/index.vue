<template>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <!-- left sidebar -->
                <left-sidebar :categories="data.categories"></left-sidebar>
            </div>

            <div class="col-sm-9 padding-right">
                <!-- main section -->
            </div>
        </div>
    </div>
</section>
</template>

<script>
    import LeftSidebar from 'comps/left-sidebar';

    export default {
        props: {
            data: Object,
        },
        components: {
            LeftSidebar,
        }
    }
</script>
