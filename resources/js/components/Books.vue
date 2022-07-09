<template>

    <div class="row" style="margin-top: 10px">
        <div class="col-md-2">
            <create>
            </create>

            <form action="#" method="get">
                <search>
                </search>
                <div class="mb-3">
                    <div class="form-label">Choose category</div>
                    <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option></option>
                        <category v-for="category in categories"
                                  :id="category.id"
                                  :name="category.name"
                                  :key="category.id">
                        </category>
                    </select>
                    <div class="form-label">Sort ASC by ...</div>

                    <select name="sort_asc" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option></option>
                        <option value="author_id">Author_id</option>
                        <option value="name">Name</option>
                        <option value="#">#</option>

                    </select>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-10 ">
             <book  class="card-body"
                    v-for="book in books"
                    :id="book.id"
                    :name="book.name"
                    :description="book.description"
                    :key="book.id">
             </book>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Book from "../components/Library/Book";
import Create from "../components/Library/Create";
import Search from "../components/Library/Search";
import Category from "../components/Library/Category";

export default {
    name: "Books",
    components: {
        Book,
        Create,
        Search,
        Category
    },
    data: () => ({
        loading: true,
        books: [],
        categories: []
    }),
    mounted() {
      this.loadBooks(),
      this.loadCategories()
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
        },
        loadCategories() {
            axios.get('/vue/categories/all')
                .then(
                    res => {
                        this.categories = res.data;
                        this.loading = false;
                    }
                )
        }
    }

}
</script>

<style scoped>

</style>
