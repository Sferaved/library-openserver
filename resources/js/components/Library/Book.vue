<template>
    <div class="container card">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="/images/books/Andrii Korzhov.jpg"  style="width: 100px" alt="...">
                        </div>
                        <div class="col-md-10">
                            <h5 class="card-title">{{name }}</h5>{{id}}
                            <p class="card-text">{{description}}</p>

                            <a href="/books/{id}/update" class="btn btn-primary">Update</a>
                            <a href="#" class="btn btn-danger"><b>Delete</b></a>
                        </div>
                    </div>
            </div>
</template>

<script>
export default {
    name: "Book",
    props: {
        id: {
            type: String,
            default: "NULL"
        },
        name: {
            type: String,
            default: "NULL"
        },
        description: {
            type: String,
            default: "NULL"
        },
    },
}
</script>

<style scoped>

</style>
