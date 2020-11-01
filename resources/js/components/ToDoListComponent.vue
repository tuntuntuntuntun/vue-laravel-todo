<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">State</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(todo,index) in todos" :key="index">
                    <th scope="row">{{ todo.id }}</th>
                    <td>{{ todo.title }}</td>
                    <td>{{ todo.content }}</td>
                    <td>{{ todo.state }}</td>
                    <td>
                        <router-link :to="{ name: 'todo.edit', params: { toDoId: todo.id } }">
                            <button class="btn btn-primary">Edit</button>
                        </router-link>
                    </td>
                    <td>
                        <button class="btn btn-danger" @click="deleteToDo(todo.id)">Delete</button>
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