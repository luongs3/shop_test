<template>
  <div id="app">
    <my-header></my-header>
    <router-link to='/'>Home</router-link>
    <router-link to='/example'>Example</router-link>
    <router-view></router-view>
    <!-- components matched link will be rendered her e -->
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
#app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
}
</style>
