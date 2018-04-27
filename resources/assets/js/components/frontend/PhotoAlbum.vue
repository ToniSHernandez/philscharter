<template>
<div class="px-4 pb-4">
    <h1 class="text-brand-darker mb-3">{{ album_name }}</h1>
    <p class="leading-normal text-grey-darker">Intro text would go here.</p>
    <img :src="photo.images[0].source" alt="" v-for="photo in photos" />
    <a :href="'/albums/' + album_id + '?before=' + before" v-if="prev != null">Prev</a>
    <a :href="'/albums/' + album_id + '?after=' + after" v-if="next != null">Next</a>
</div>
</template>

<script>
    export default {
        props: {
            dataPhotos: {
                type: Object,
                default: this.photos
            }
        },
        data () {
            return {
                album_name: '',
                album_id: '',
                photos: [],
                before: '',
                after: '',
                prev: null,
                next: null
            }
        },
        mounted () {
            this.photos = this.dataPhotos.data;
            this.before = this.dataPhotos.paging.cursors.before;
            this.after = this.dataPhotos.paging.cursors.after;
            this.next = this.dataPhotos.paging.next;
            this.prev = this.dataPhotos.paging.previous;
            this.album_name = this.photos[0].album.name;
            this.album_id = this.photos[0].album.id;
        }
    }
</script>
