<template>
    <h1>{{ title }}</h1>
    <User v-for="(user, index) in users" v-bind:key="index" :user="user" text="some text ..."></User>
</template>

<script>
    import User from './User.vue';
    export default {
        components: {
            User,
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
        methods: {

        },
        computed: {

        }
    }
</script>

<style scoped>

</style>