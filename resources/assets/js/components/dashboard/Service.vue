<template>
    <div>
        <div v-if="editingService !== index"
             class="p-2 mb-1 bg-grey-lighter rounded flex flex-wrap justify-between items-center">
            <p class="text-grey-darkest">{{ service.title }}</p>
            <div class="actions flex items-center">
                <a @click="openService(index)"
                   class="bg-grey-darker text-sm rounded-full no-underline py-1 px-2 cursor-pointer mx-1 text-white">edit</a>
                <a @click="deleteService(index)"
                   class="bg-red text-sm rounded-full no-underline py-1 px-2 cursor-pointer mx-1 text-white">delete</a>
            </div>
        </div>
        <div v-if="editingService === index" class="bg-grey-lightest rounded p-4 mb-1">
            <form class="form-inputs flex flex-wrap">
                <div class="w-full px-1">
                    <input v-model="service.title" type="text" class="input-text w-full" name="service_title"
                           placeholder="Service Name">
                </div>
                <div class="w-full px-1">
                    <input v-model="service.subtitle" type="text" class="input-text w-full" name="service_subtitle"
                           placeholder="Subtitle">
                </div>
                <div class="w-full md:w-1/4 px-1">
                    <input v-model="service.rate" type="text" class="input-text w-8" name="service_price"
                           placeholder="Rate">
                </div>
                <div class="w-full md:w-3/4 px-1">
                    <input v-model="service.rate_info" type="text" class="input-text w-full" name="service_rate_info"
                           placeholder="Additional rate information">
                </div>
                <div class="w-full px-1">
                    <textarea v-model="service.description" name="service_description"
                              class="input-textarea w-full block h-24" placeholder="Description"></textarea>
                </div>
                <div class="w-full px-1 py-4">
                    <input type="checkbox" id="featured" name="service_featured" v-model="service.featured">
                    <label for="featured">Feature on the Home page?</label>
                </div>
                <div class="w-full px-1 py-4">
                    <div class="sm:max-w-sm">
                        <input type="file" name="" id="">
                        <!-- <image-upload :resource-path="service.photo_url" :resource-name="service.slug"></image-upload> -->
                    </div>
                </div>
            </form>
            <div class="flex justify-between items-center pt-2">
                <a class="inline-block bg-grey text-white rounded-full py-2 px-3 no-underline cursor-pointer"
                   @click="closeService">nevermind</a>
                <a class="button-kma" @click="editService(service)">Edit Service</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
           index: {
               type: Number,
               default: this.index
           },
           service: {
               type: Object,
               default: this.service
           }
        },
        data(){
            return {
                editingService: null,
                isInitial: true
            }
        },
        mounted() {

        },
        methods: {
            openService(index){
                this.editingService = index;
            },
            editService(service){
                axios.patch('/api/services', service)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.closeService();
            },
            closeService(){
                this.editingService = null;
            },
            deleteService(service){
                this.services.splice(service, 1)
            },
            filesChange(name,file){
                this.isInitial = false;
                console.log(name);
                console.log(file);
            }
        }
    }
</script>

<style scoped>

</style>