<template>
    <div>
        <div v-for="album in albums" :key="service.id" class="w-full sm:w-1/2 lg:w-1/4 pb-4 px-4 sm:pt-4" >

        </div>
    </div>
</template>

<script>
    export default {
        name: "PhotoAlbums",

        props: {
            albums: Object,
            default: {}
        }
    }
</script>

<style scoped>

</style>