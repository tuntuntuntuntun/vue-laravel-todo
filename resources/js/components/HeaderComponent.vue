<template>
    <div class="container-fluid bg-info mb-3">
        <div class="container">
            <nav class="navbar navbar-info">
                <span class="navbar-brand mb-0 h1 text-light">ToDo</span>
                <div>
                    <router-link :to="{ name: 'todo.list' }">
                        <button class="btn btn-dark text-light">一覧</button>
                    </router-link>
                    <router-link :to="{ name: 'todo.create' }">
                        <button class="btn btn-dark text-light">追加</button>
                    </router-link>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {}
</script>