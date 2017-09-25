<template>
  <div id="app">
    <img src="images/home/logo.png">
    <router-link to='/'>Home</router-link>
    <router-link :to="{ name: 'Example', params: {} }">Go To Example</router-link>

    <!-- components matched link will be rendered here -->
    <router-view></router-view>
  </div>
</template>

<script>
    export default {
        name: 'app'
    }
</script>

<style>
#app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
}
</style>
