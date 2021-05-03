<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                <span class="navbar-brand mb-0 h1">{{ title }}</span>
                <div>
                    <button class="btn btn-success">Login</button>
                    <button class="btn btn-success">Sign In</button>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Header',
        data: function () {
            return {
                title: 'Health Manage',
                isLogin: false,
            }
        },
        mounted: function () {
            this.isLogin = localStorage.getItem('login');
        },
        methods: {
        }
    }
</script>
