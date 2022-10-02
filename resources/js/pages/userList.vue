<template>
    <h1>User List</h1>
    <user v-for="(user, index) in users" v-bind:key="index" :user="user" text="some text ..."></user>
</template>

<script>
    import user from '../components/user.vue';
    export default {
        components: {
            user,
        },
        data() {
            return {
                title: 'CRM Help Desc',
                users: [
                    {
                        first_name: 'Ivan',
                        last_name: 'Petrov'
                    },
                    {
                        first_name: 'Semen',
                        last_name: 'Ivanov'
                    },
                    {
                        first_name: 'Peter',
                        last_name: 'Semenov'
                    }
                ]
            }
        },
    }
</script>

<style scoped>

</style>