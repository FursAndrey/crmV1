<template>
    <div>
        {{ user.last_name }} {{ user.first_name}}
    </div>
    <p>{{ text }}</p>
</template>

<script>
    export default {
        name: 'User',
        props: [
            'user',
            'text',
        ],
        data() {
            return {

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