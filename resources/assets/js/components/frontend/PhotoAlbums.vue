<template>
    <div>
        <div v-for="album in albums" class="w-full sm:w-1/2 lg:w-1/4 pb-4 px-4 sm:pt-4" >
            <a :href="'/albums/' + album.id">
                <p>
                    {{ album.name }}
                </p>
                <img :src="album.cover_photo.picture" :alt="album.name">
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                albums: []
            }
        },
        mounted () {
            axios.get('api/albums')
                 .then(response => {
                     this.albums = response.data.data;
                 })
                 .catch(error => {
                     // Something is broken
                     // Probably a token
                     // Display a message that we'll fix it (we're hopin').
                 })
        }
    }
</script>