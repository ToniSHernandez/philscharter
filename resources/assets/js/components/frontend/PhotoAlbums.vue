<template>
    <div>
        <div class="flex flex-wrap justify-center items-center w-full" v-masonry transition-duration="0s" item-selector=".album" >
            <div v-for="album in albums" v-if="album.name !== 'Cover Photos' && album.name !== 'Profile Pictures'" v-masonry-tile class="album w-full sm:w-1/2 lg:w-1/4 pb-4 px-4 sm:pt-4"  >
                <a :href="'/albums/' + album.id" class="block no-underline">
                    <div class="block rounded overflow-hidden cursor-pointer no-underline border border-grey shadow">
                        <img class="block relative z-20 w-full" :src="album.cover_photo.images[0].source" :alt="album.name">
                    </div>
                    <div class="py-2 text-grey-darker">
                        {{ album.name }}
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                albums: [],
                isRolling: false
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