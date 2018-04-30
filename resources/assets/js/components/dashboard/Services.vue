<template>
    <div>
        <div class="services-list border-b border-grey-dark pt-4 pb-3">
            <admin-service v-for="(service, index) in services" :key="service.id" :service="service" :index="index" ></admin-service>
        </div>
        <div class="new-service py-4">
            <a v-if="!addingService" class="inline-block bg-kma text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="openNewServicePanel" >Add a Service</a>
            <div v-if="addingService" class="bg-grey-lightest rounded p-4" >
                <h2 class="font-normal mb-2">New Service</h2>
                <form class="form-inputs flex flex-wrap" enctype="multipart/form-data">
                    <div class="w-full px-1">
                        <input v-model="newService.title" type="text" class="input-text w-full" name="service_title" placeholder="Service Name" >
                    </div>
                    <div class="w-full px-1">
                        <input v-model="newService.subtitle" type="text" class="input-text" name="service_subtitle" placeholder="Subtitle" >
                    </div>
                    <div class="w-full md:w-1/4 px-1">
                        <input v-model="newService.rate" type="text" class="input-text w-8" name="service_price" placeholder="Rate" >
                    </div>
                    <div class="w-full md:w-3/4 px-1">
                        <input v-model="newService.rate_info" type="text" class="input-text" name="service_rate_info" placeholder="Additional rate information" >
                    </div>
                    <div class="w-full px-1">
                        <textarea v-model="newService.description" name="service_description" class="input-textarea w-full block h-24" placeholder="Description"></textarea>
                    </div>
                    <div class="w-full px-1 py-4">
                        <label>
                            <input type="checkbox" name="service_featured" v-model="newService.featured" value="1" unchecked-value="0" />
                            Feature on the Home page?
                        </label>
                    </div>
                    <div class="w-full px-1 py-4">
                        <div class="sm:max-w-sm">
                            <input type="file" name="photo" @change="photoUploaded($event.target.files[0])" />
                            <!-- <image-upload :resource-path="newService.photo_url" :resource-name="newService.slug"></image-upload> -->
                        </div>
                    </div>
                </form>
                <div class="flex justify-between items-center pt-2">
                    <a class="inline-block bg-grey text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="closeNewServicePanel" >nevermind</a>
                    <a class="button-kma" @click="addService" >Add Service</a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                services:  [],
                file: {},
                addingService: false,
                newService: {},
                isInitial: true,
                dropzoneOptions: {
                    url: ''
                }
            }
        },
        mounted() {
            window.axios.get('/api/services')
                .then(response => {
                    this.services = response.data
                });

        },
        methods: {
            openNewServicePanel(){
                this.addingService = true;
            },
            closeNewServicePanel(){
                this.addingService = false;
            },
            addService(){
                this.services.push(this.newService);
                let vm = this;
                let formData = new FormData();
                Array.from(Object.keys(this.newService)).map(x => {
                    formData.append(x, this.newService[x])
                });
                axios.post('/api/services', formData)
                    .then(function (response) {
                        console.log(response);
                        vm.newService = {};
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                this.closeNewServicePanel();
            },
            photoUploaded(file) {
                this.newService.photo = file;
            }
        }
    }
</script>
