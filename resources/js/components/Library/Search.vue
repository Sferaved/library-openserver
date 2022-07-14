<template>
    <div class="mb-3">
        <label for="search" class="form-label">Search by name</label>
        <input v-model="search" class="form-control" id="search" placeholder="Type something">
    </div>
</template>

<script>
export default {
    name: "Search",
    data: () => ({
       search: ''
    }),
}
</script>

<style scoped>

</style>
