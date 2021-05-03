<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Blood Pressure</th>
                    <th scope="col">Physical Condition</th>
                    <th scope="col">Food</th>
                    <th scope="col">Sleep</th>
                    <th scope="col">Work</th>
                    <th scope="col">Amount of training</th> 
                    <th scope="col">Show</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(task, index) in tasks" :key="index">
                    <th scope="row">{{ index }}</th>
                    <td>{{ task.weight }}</td>
                    <td>{{ task.blood_pressure }}</td>
                    <td>{{ task.physical_condition }}</td>
                    <td>{{ task.sleep }}</td>
                    <td>{{ task.work }}</td>
                    <td>{{ task.training }}</td>
                    <td>
                        <button class="btn btn-primary">Show</button>
                    </td>
                    <td>
                        <button class="btn btn-success">Edit</button>
                    </td>
                    <td>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: 'Task',
        data: function () {
            return {
                tasks: [],
            }
        },
        mounted: function () {
            this.getTasks();
        },
        methods: {
            async getTasks() {
                await axios.get('/tasks')
                .then((res) => {
                    if (res.status_code == 2000) {
                        this.tasks = res.data;
                    }
                })
                .catch((e) => {
                    console.log(e);
                });
            },
        }
    }
</script>
