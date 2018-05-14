<template>
<div>
    <div class="px-4 pb-4 w-full">
        <h1 class="text-brand-darker mb-3">{{ album_name }}</h1>
    </div>
    <div class="w-full">
        <div class="flex flex-wrap justify-center items-center w-full" v-masonry transition-duration="0s" item-selector=".photo" >
            <div v-for="(photo, index) in photos" v-masonry-tile class="photo w-full sm:w-1/2 lg:w-1/4 p-4">
                <a @click="openViewer(index)" class="block rounded overflow-hidden cursor-pointer no-underline border border-grey shadow">
                <img :src="photo.images[0].source" class="block" />
                </a>
            </div>
        </div>
        <div class="flex justify-center px-4 pb-4">
            <a class="w-auto button-secondary-outlined mx-2" :href="'/albums/' + album_id + '?before=' + before" v-if="prev != null">Prev</a>
            <a class="w-auto button-secondary-outlined mx-2" :href="'/albums/' + album_id + '?after=' + after" v-if="next != null">Next</a>
        </div>
    </div>
    <div class="fixed gallery-viewer bg-secondary-80 pin z-50" v-if="galleryIsOpen" >
        <div class="flex justify-center items-center p-4 flex-col">
            <div class="flex justify-center items-center justify-center flex-grow w-full" @click="closeViewer()" >
                <img :src="activePhoto.images[0].source" :alt="album_name" class="block max-w-full max-h-full" />
            </div>
            <div class="flex justify-center items-start p-4 justify-center h-8 flex-no-grow" >
                <a class="bg-white cursor-pointer py-3 px-4 rounded-full h-12 w-12 text-secondary text-center m-2 relative z-50" style="transform: rotate(180deg)" @click="prevPhoto(activePhoto.index)">
                    <svg class="fill-current h-6 w-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                    viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;"  xml:space="preserve">
                        <polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153"></polygon>
                    </svg>
                </a>
                <a class="bg-white cursor-pointer py-3 px-4 rounded-full h-12 w-12 text-secondary text-center m-2 relative z-50 flex-no-shrink" @click="nextPhoto(activePhoto.index)">
                    <svg class="fill-current h-6 w-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                    viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;"  xml:space="preserve">
                        <polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153"></polygon>
                    </svg>
                </a>
            </div>
        </div>
    </div>
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
                next: null,
                galleryIsOpen: false,
                activePhoto: {},
                numPhotos: 0
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
            this.numPhotos = this.photos.length;
        },
        methods: {
            openViewer(index){
                this.galleryIsOpen = true;
                this.activePhoto = this.photos[index];
                this.activePhoto.index = index;

                console.log(this.activePhoto);
            },
            closeViewer(){
                this.galleryIsOpen = false;
            },
            nextPhoto(index){
                var newNum = (index !== this.numPhotos-1 ? index+1 : 0);
                this.activePhoto = this.photos[newNum];
                this.activePhoto.index = newNum;
            },
            prevPhoto(index){
                var newNum = (index !== 0 ? index-1 : this.numPhotos-1);
                this.activePhoto = this.photos[newNum];
                this.activePhoto.index = newNum;
            }
        }
    }
</script>
