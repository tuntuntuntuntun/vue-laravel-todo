<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="error">
                    <div v-if="errors != ''">{{ errors.state }}</div>
                    <div v-if="errors != ''">{{ errors.title }}</div>
                    <div v-if="errors != ''">{{ errors.content }}</div>
                </div>
                <form @submit.prevent="submit">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                todo: {},
                errors: {
                    state: '',
                    title: '',
                    content: '',
                }
            }
        },
        methods: {
            submit () {
                if (!this.todo.state) {
                    this.errors.state = '状態を選んでください'
                } else {
                    this.errors.state = ''
                }

                if (!this.todo.title) {
                    this.errors.title = 'タイトルを入力してください'
                } else {
                    this.errors.title = ''
                }

                if (!this.todo.content) {
                    this.errors.content = '内容を入力してください'
                } else {
                    this.errors.content = ''
                }

                if (!this.todo.state || !this.todo.title || !this.todo.content) {
                    return
                }

                axios.post('/api', this.todo)
                    .then((res) => {
                        this.$router.push({ name: 'todo.list'})
                    })
            }
        }
    }
</script>

<style scoped>
    .error {
        margin-bottom: 20px;
        color: red;
        font-size: 20px;
    }
</style>