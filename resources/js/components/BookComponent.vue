<template>
    <div>
        <div class="form-horizontal mb-2">
            <div class="form-group">
                <div class="col-auto">
                    <router-link to="/books/create" class="btn btn-info" target="_blank">New book</router-link>
                </div>
            </div>
        </div>
        <v-table
            :data="books"
            :filters="filters"
            :hideSortIcons="true"
            class="my-2 table table-striped"
            :currentPage.sync="currentPage"
            :pageSize="5"
            @totalPagesChanged="totalPages = $event"
        >
            <thead slot="head">
            <v-th ></v-th>
            <v-th sortKey="id">#</v-th>
            <v-th sortKey="category_id">Category</v-th>
            <v-th sortKey="author_id">Author</v-th>
            <v-th sortKey="name" >Name</v-th>
            <v-th sortKey="description">Description</v-th>
            </thead>
            <tbody slot="body" slot-scope="{displayData}">
            <tr>
                <td></td>
                <td><input class="form-input input-sm" v-model="filters.id.value" placeholder="Select by id"></td>
                <td><input class="form-input input-sm" v-model="filters.category_id.value" placeholder="Select by category_id"></td>
                <td><input class="form-input input-sm" v-model="filters.author_id.value" placeholder="Select by author_id"></td>
                <td><input class="form-input input-lg" v-model="filters.name.value" placeholder="Select by name"></td>
                <td> <input class="form-input input-lg" v-model="filters.description.value"  placeholder="Select by description"></td>
                <td></td>
            </tr>
            <tr v-for="row in displayData" :key="row.id">

                <td><img :src="(row.cover)" style="width: 50px" alt=""></td>
                <td> {{ row.id }}</td>
                <td> {{ row.category_id }}</td>
                <td> {{ row.author_id }}</td>
                <td>{{ row.name }} </td>
                <div class="container col-md-12">
                   {{ row.description }}
                </div>

                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'updateBook', params: { id: row.id }}" class="btn btn-success" target="_blank">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteUser(row.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </v-table>
            <smart-pagination
                :currentPage.sync="currentPage"
                :totalPages="totalPages"
                :maxPageLinks="maxPageLinks"
            />
    </div>
</template>



<script>
import axios from 'axios';
export default {
    name: "books",
    data: () => ({
        loading: true,
        books: [],
        currentPage: 1,
        totalPages: 0,
        maxPageLinks: 15,
        filters: {
            id: { value: "", keys: ["id"] },
            category_id: { value: "", keys: ["category_id"] },
            author_id: { value: "", keys: ["author_id"] },
            name: { value: "", keys: ["name"] },
            description: { value: "", keys: ["description"] }
        }
    }),
    mounted() {
        this.getBooks()
    },
    methods: {
        getBooks() {
            axios.get('/vue/books/all')
                .then(
                    res => {
                        this.books = res.data;
                        this.loading = false;
                    }
                )
        },
        deleteUser(id) {

            axios.get('/vue/books/delete/'+ id)
                .then(response => {
                    let i = this.books.map(data => data.id).indexOf(id);
                    this.books.splice(i, 1);
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
