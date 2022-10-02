<template>
    <h1>User List</h1>
    <user v-for="(user, index) in users" v-bind:key="index" :user="user" text="some text ..."></user>
</template>

<script>
    import axios from 'axios';
    import user from '../components/user.vue';

    export default {
        components: {
            user,
        },
        data() {
            return {
                title: 'CRM Help Desc',
                users: []
            }
        },
        async mounted() {
            let result = await axios.get('/users');
            this.users = result.data;
            // axios.get('/users').then(result => this.users = result.data);
        }
    }
</script>

<style scoped>

</style>