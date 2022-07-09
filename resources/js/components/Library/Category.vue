<template>

    <option :id="value">{{ name }}</option>

</template>

<script>
export default {
    name: "Category",
    props: {
        id: {
            type: String,
            default: "NULL"
        },
        name: {
            type: String,
            default: "NULL"
        }
    },
}
</script>

<style scoped>

</style>
