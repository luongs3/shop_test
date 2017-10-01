<template>
<div id="panel-multiple">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <router-link :to="{
                    name: 'category',
                    params: {sku: category.sku}
                }">
                    {{ category.name }}
                </router-link>
                <a
                    data-toggle="collapse"
                    data-parent="#accordian"
                    :href="'#' . category.sku"
                    class="badge pull-right"
                >
                    <i class="fa fa-plus"></i>
                </a>
            </h4>
        </div>
        <div :id="'#' . category.sku" class="panel-collapse collapse">
            <div class="panel-body">
                <ul v-if="category.descendants.length">
                    <li v-for="item in category.descendants">
                        <router-link :to="{
                            name: 'category',
                            params: {sku: item.sku}
                        }">
                            {{ item.name }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: {
            category: Object,
            required: true,
        },
        mounted() {
            console.log('category: ', category);
        }
    }
</script>
