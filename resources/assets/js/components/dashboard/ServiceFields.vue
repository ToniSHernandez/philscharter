<template>
    <div>
        <form class="form-inputs flex flex-wrap" enctype="multipart/form-data">
            <div class="w-full px-1">
                <input v-model="localService.title" type="text" class="input-text w-full" name="service_title" placeholder="Service Name" >
            </div>
            <div class="w-full px-1">
                <input v-model="localService.subtitle" type="text" class="input-text" name="service_subtitle" placeholder="Subtitle" >
            </div>
            <div class="w-full md:w-1/4 px-1">
                <input v-model="localService.rate" type="text" class="input-text w-8" name="service_price" placeholder="Rate" >
            </div>
            <div class="w-full md:w-3/4 px-1">
                <input v-model="localService.rate_info" type="text" class="input-text" name="service_rate_info" placeholder="Additional rate information" >
            </div>
            <div class="w-full px-1">
                <textarea v-model="localService.description" name="service_description" class="input-textarea w-full block h-24" placeholder="Description"></textarea>
            </div>
            <div class="w-full px-1 py-4">
                <label>
                    <input type="checkbox" name="service_featured" v-model="localService.featured" value="1" unchecked-value="0" />
                    Feature on the Home page?
                </label>
            </div>
            <input type="hidden" v-model="localService.photo_url" >
            <div class="w-full px-1 py-4" v-if="localService.photo_url !== null">
                <div class="sm:max-w-sm">
                    <img :src="'/storage/' + localService.photo_url" alt="">
                </div>
                <div class="sm:max-w-sm">
                    <input type="file" name="photo" @change="photoUploaded($event.target.files[0])" />
                </div>
            </div>
            <div class="w-full px-1 py-4" v-else>
                <div class="sm:max-w-sm">
                    <img :src="preview" :ref="preview" alt="Your image">
                </div>
                <div class="sm:max-w-sm">
                    <input type="file" name="photo" @change="photoUploaded($event.target.files[0])" />
                </div>
            </div>
        </form>
        <div class="flex justify-between items-center pt-2">
            <a class="button-kma" @click="$emit('submitForm', localService)" >Save Service</a>
            <a class="button-grey" @click="$emit('closeForm')" >nevermind</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            service: {
                type: Object,
                default: {}
            }
        },
        data(){
            return{
                localService: {},
                preview: null
            }
        },
        mounted(){
            this.localService = this.service;
        },
        methods: {
            photoUploaded(file) {
                this.localService.photo = file;
                console.log(this.localService.photo);
            }
        }
    }
</script>