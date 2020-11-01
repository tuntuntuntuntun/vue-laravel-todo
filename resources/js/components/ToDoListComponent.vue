<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">content</th>
                <th scope="col">state</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(todo,index) in todos" :key="index">
                    <th scope="row">{{ todo.id }}</th>
                    <td>{{ todo.title }}</td>
                    <td>{{ todo.content }}</td>
                    <td v-if="todo.state == 0">waiting</td>
                    <td v-else-if="todo.state == 1">working</td>
                    <td v-else-if="todo.state == 2">completed</td>
                    <td>
                        <router-link :to="{ name: 'todo.edit', params: { toDoId: todo.id } }">
                            <button class="btn btn-primary">edit</button>
                        </router-link>
                    </td>
                    <td>
                        <button class="btn btn-danger" @click="deleteToDo(todo.id)">delete</button>
                    </td>
                </tr> 
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                todos: []
            }
        },
        methods: {
            getToDos () {
                axios.get('/api')
                .then((res) => {
                    this.todos = res.data;
                });
            },
            deleteToDo (id) {
                axios.delete('/api/' + id)
                    .then((res) => {
                        this.getToDos()
                    })
            }
        },
        mounted () {
            this.getToDos();
        }
    }
</script>