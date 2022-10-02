<!-- <script setup>
    import { RouterLink, RouterView } from 'vue-router'
</script> -->

<template>
    <h1>My Router</h1>
    <RouterLink to="/">Home</RouterLink> |
    <RouterLink to="/users">userList</RouterLink>
    <router-view></router-view>
</template>

<style scoped>

</style>