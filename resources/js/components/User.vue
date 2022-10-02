<template>
    <div>
        {{ user.last_name }} {{ user.first_name}}
    </div>
    <p>{{ text }}</p>
    <p><router-link :to="'/users/'+user.last_name">User's page</router-link></p>
</template>

<script>
    export default {
        name: 'User',
        props: [
            'user',
            'text',
        ],
    }
</script>

<style scoped>
</style>