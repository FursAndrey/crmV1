<template>
    <h1>User Page</h1>
    <h2>User's name: {{ userName }}</h2>
</template>

<script>
export default{
    data() {
        return {
            userName: null,
        };
    },
    mounted() {
        this.userName = this.$route.params.name;
    },
}
</script>

<style scoped>
p {
    cursor: pointer;
}
</style>