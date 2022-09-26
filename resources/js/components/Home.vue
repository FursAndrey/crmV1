<template>
    <h1>CRM Help Desc</h1>
    <p v-if="conditions">{{ heloVue }}</p>
    <p v-else>{{ heloLaravel }}</p>
    <button v-on:click="boolTriger">Hello triger</button>
    <ul>
        <li v-for="detail in details">{{ detail }}</li>
    </ul>
    <div id="count" :style="{ backgroundColor:bg_color, color:ft_color }">
        Count({{ count }}) {{ color }}
    </div>
    <button v-on:click="addCount" @mouseover="clearCount">Add count</button>
    <ol>
        <todo-item v-for="item in groceryList" v-bind:todo="item" v-bind:key="item.id"></todo-item>
    </ol>
    <ol>
        <li v-for="item in groceryList">{{ item.text }}</li>
    </ol>
</template>

<script>
    const TodoItem = {
        props: ['todo'],
        template: `<li>{{ todo.text }}</li>`
    }
    export default {
        name: 'home',
        components: {
            TodoItem // Регистрируем новый компонент
        },
        data: function() {
            return {
                vue: 'Vue',
                laravel: 'Laravel',
                conditions: false,
                details: ['1 step', '2 step', '3 step'],
                count: 0,
                bg_color: 'green',
                ft_color: 'white',
                groceryList: [
                    { id: 0, text: 'Vegetables' },
                    { id: 1, text: 'Cheese' },
                    { id: 2, text: 'Whatever else humans are supposed to eat' }
                ]
            }
        },
        methods: {
            addCount: function() {
                this.count++;
                this.bg_color = 'yellow';
                this.ft_color = 'black';
            },
            boolTriger() {
                this.conditions = !this.conditions;
            },
            clearCount() {
                this.count = 0;
                this.bg_color = 'blue';
                this.ft_color = 'white';
            }
        },
        computed: {
            heloVue() {
                return 'Hello '+this.vue+'!'; 
            },
            heloLaravel() {
                return 'Hello '+this.laravel+'!'; 
            }
        }
    }
</script>

<style scoped>

</style>