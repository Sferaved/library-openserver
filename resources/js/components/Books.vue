<template>

    <div class="row" style="margin-top: 10px">
        <div class="col-md-2">
            <create>
            </create>

            <form action="#" method="get">
            <search>
            </search>

            <sorting>
            </sorting>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        <div class="col-md-10 ">
             <book  class="card-body"
                    v-for="book in books"
                    :id="book.id"
                    :name="book.name"
                    :description="book.description">
             </book>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Book from "../components/Library/Book";
import Create from "../components/Library/Create";
import Search from "../components/Library/Search";
import Sorting from "../components/Library/Sorting";
export default {
    name: "Books",
    components: {
        Book,
        Create,
        Search,
        Sorting
    },
    data: () => ({
        loading: true,
        books: []
    }),
    mounted() {
      this.loadBooks()
    },
    methods: {
        loadBooks() {
            axios.get('/vue/books/all')
            .then(
                res => {
                    this.books = res.data;
                    this.loading = false;
                }
            )
        }
    }

}
</script>

<style scoped>

</style>
