<template>
    <div>
        {{ user.name }} ({{ user.role}})
    </div>
    <p>{{ text }}</p>
    <p><router-link :to="'/users/'+user.id">User's page</router-link></p>
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