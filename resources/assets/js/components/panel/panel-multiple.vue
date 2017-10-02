<template>
<div id="panel-multiple">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <div>
                    <span class="badge pull-right">
                        <a data-toggle="collapse" data-parent="#accordian" :href="`#${category.sku}`">
                            <i class="fa fa-plus"></i>
                        </a>
                    </span>
                    <router-link :to="`/categories/${category.sku}`">
                        {{ category.name }}
                    </router-link>
                </div>
            </h4>
        </div>
        <div :id="`${category.sku}`" class="panel-collapse collapse">
            <div class="panel-body">
                <ul v-if="category.descendants.length">
                    <li v-for="item in category.descendants">
                        <router-link  :to="`/categories/${item.sku}`">
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
    }
</script>
