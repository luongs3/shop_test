<template>
    <div id="home">
        <my-header></my-header>
        <section>
            <div class="container">
                <router-view></router-view>
            </div>
        </section>
    </div>
</template>

<script>
import MyHeader from 'comps/header';

export default {
    components: {
        MyHeader,
    },
}
</script>

<style>
</style>
