<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form @submit.prevent="submit">
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-model="todo.id">
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0" v-model="todo.state">
                            <label for="inlineRadio1" class="col-sm-3 col-form-label">waiting</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1" v-model="todo.state">
                            <label for="inlineRadio2" class="col-sm-3 col-form-label">working</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="2" v-model="todo.state">
                            <label for="inlineRadio3" class="col-sm-3 col-form-label">completed</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <input type="text" class="col-sm-9 form-control" id="title" v-model="todo.title">
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Content</label>
                        <input type="text" class="col-sm-9 form-control" id="content" v-model="todo.content">
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            toDoId: String
        },
        data () {
            return {
                todo: {}
            }
        },
        methods: {
            getToDo () {
                axios.get('/api/' + this.toDoId)
                    .then((res) => {
                        this.todo = res.data
                    })
            },
            submit () {
                axios.put('/api/' + this.toDoId, this.todo)
                    .then((res) => {
                        this.$router.push({ name: 'todo.list' })
                    })
            }
        },
        mounted () {
            this.getToDo()
        }
    }
</script>