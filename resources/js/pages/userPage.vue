<template>
    <h1>User Page</h1>
    <h2>User's name: {{ user.name }}</h2>
    <h2>User's email: {{ user.email }}</h2>
</template>

<script>
import axios from 'axios';

export default{
    data() {
        return {
            userId: null,
            user: {},
        };
    },
    mounted() {
        this.userId = this.$route.params.id;
        axios.get(`/user/${this.userId}`).then(result => this.user = result.data);
    },
}
</script>

<style scoped>
p {
    cursor: pointer;
}
</style>