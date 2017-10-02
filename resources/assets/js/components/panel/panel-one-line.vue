<template>
    <div id="panel-one-line">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <router-link v-if="category.sku" :to="`/categories/${category.sku}`">
                        {{ category.name }}
                    </router-link>
                </h4>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            category: Object
        }
    }
</script>
