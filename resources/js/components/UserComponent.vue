<template>
    <div>
        <div class="form-horizontal mb-2">
            <div class="form-group">
                <div class="col-auto">
                     <router-link to="/users/create" class="btn btn-info" target="_blank">New user</router-link>
                </div>
            </div>
        </div>
        <v-table
            :data="users"
            :filters="filters"
            :hideSortIcons="true"
            class="my-2 table table-striped"
            :currentPage.sync="currentPage"
            :pageSize="5"
            @totalPagesChanged="totalPages = $event"
        >
            <thead slot="head">
            <v-th sortKey="id">#</v-th>
            <v-th ></v-th>
            <v-th sortKey="name" >Name</v-th>
            <v-th sortKey="email">Email</v-th>
            </thead>
            <tbody slot="body" slot-scope="{displayData}">
            <tr>
                <td><input class="form-input input-sm" v-model="filters.id.value" placeholder="Select by id"></td>
                <td></td>
                <td><input class="form-input input-lg" v-model="filters.name.value" placeholder="Select by name"></td>
                <td> <input class="form-input input-lg" v-model="filters.email.value"  placeholder="Select by email"></td>
                <td></td>
            </tr>
            <tr v-for="row in displayData" :key="row.id">
                <td>{{ row.id }}</td>

                <td><img :src="( row.avatar )" style="width: 50px" alt=""></td>
                <td>{{ row.name }}</td>
                <td>{{ row.email }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'update', params: { id: row.id }}" class="btn btn-success" target="_blank">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteUser(row.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </v-table>

        <smart-pagination
            :currentPage.sync="currentPage"
            :totalPages="totalPages"
        />

    </div>
</template>



<script>
import axios from 'axios';
export default {
    name: "users",
    data: () => ({
        loading: true,
        users: [],
        currentPage: 1,
        totalPages: 0,
        filters: {
            id: { value: "", keys: ["id"] },
            name: { value: "", keys: ["name"] },
            email: { value: "", keys: ["email"] }
        }
    }),
    mounted() {
        this.getUsers()
    },
    methods: {
        getUsers() {
            axios.get('/vue/users/all')
                .then(
                    res => {
                        this.users = res.data;
                        this.loading = false;
                    }
                )
        },
        deleteUser(id) {

            axios.get('/vue/users/delete/'+ id)
                .then(response => {
                    let i = this.users.map(data => data.id).indexOf(id);
                    this.users.splice(i, 1);
                    alert(response.data)
                });
        }
    }

}
</script>


<style>
body {
    padding: 1rem;
}
thead {
    cursor: pointer;
}
td {
    white-space: nowrap;
}
.vt-sort::after {
    padding-left: 0.5em;
    display: inline-block;
}

.vt-sortable::after {
    content: "\25B2";
    color: transparent;
}

.vt-asc::after {
    content: "\25BC";
}

.vt-desc::after {
    content: "\25B2";
}
</style>
