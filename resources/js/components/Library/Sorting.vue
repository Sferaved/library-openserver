<template>
    <div class="mb-3">
        <div class="form-label">Choose category</div>
        <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option></option>

            <option value=""</option>

        </select>
        <div class="form-label">Choose author</div>
        <select name="author_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option></option>

            <option value=" "> </option>

        </select>
        <div class="form-label">Sort ASC by ...</div>

        <select name="sort_asc" class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option value=" ">   </option>
          </select>
    </div>
</template>

<script>
export default {
    name: "Sorting"
}
</script>

<style scoped>

</style>
