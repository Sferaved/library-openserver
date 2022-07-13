<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <datatable :columns="columns" :data="rows"></datatable>
                        <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import DatatableFactory from 'vuejs-datatable';

export default {
    components: { DatatableFactory },
    mounted() {
        console.log('Component mounted.')
    },
    data(){
        return {
            columns: [
                {label: 'id', field: 'id'},
                {label: 'Name', field: 'name'},
                {label: 'Email', field: 'email'},
                {label: 'Created_at', field: 'created_at'}
            ],
            rows: [],
            page: 1,
            per_page: 5,
        }
    },
    methods:{
        getUsers: function() {
            axios.get('/vue/users/all').then(function(response){
                this.rows = response.data;
            }.bind(this));
        }
    },
    created: function(){
        this.getUsers()
    }
}
</script>
