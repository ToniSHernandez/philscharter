<template>
    <div>
        <div class="services-list border-b border-grey-dark pt-4 pb-3">
            <div v-for="(service, index) in services" >
                <div v-if="editingService !== index" class="p-2 mb-1 bg-grey-lighter rounded flex flex-wrap justify-between items-center" >
                    <p class="text-grey-darkest">{{ service.title }}</p>
                    <div class="actions flex items-center">
                        <a @click="openService(service, index)" class="bg-grey-darker text-sm rounded-full no-underline py-1 px-2 cursor-pointer mx-1 text-white" >edit</a>
                        <a @click="deleteService(service, index)" class="bg-red text-sm rounded-full no-underline py-1 px-2 cursor-pointer mx-1 text-white" >delete</a>
                    </div>
                </div>
                <div v-if="editingService === index" class="bg-grey-lightest rounded p-4 mb-1">
                    <form class="form-inputs flex flex-wrap">
                        <div class="w-full px-1">
                            <input v-model="service.title" type="text" class="input-text w-full" name="service_title" placeholder="Service Name" >
                        </div>
                        <div class="w-full px-1">
                            <input v-model="service.subtitle" type="text" class="input-text w-full" name="service_subtitle" placeholder="Subtitle" >
                        </div>
                        <div class="w-full md:w-1/4 px-1">
                            <input v-model="service.rate" type="text" class="input-text w-8" name="service_price" placeholder="Rate" >
                        </div>
                        <div class="w-full md:w-3/4 px-1">
                            <input v-model="service.rate_info" type="text" class="input-text w-full" name="service_rate_info" placeholder="Additional rate information" >
                        </div>
                        <div class="w-full px-1">
                            <textarea v-model="service.description" name="service_description" class="input-textarea w-full block h-24" placeholder="Description"></textarea>
                        </div>
                        <div class="w-full px-1 py-4">
                            <input type="checkbox" id="featured" name="service_featured" v-model="service.featured">
                            <label for="featured">Feature on the Home page?</label>
                        </div>
                    </form>
                    <div class="flex justify-between items-center pt-2">
                        <a class="inline-block bg-grey text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="closeService" >nevermind</a>
                        <a class="button-kma" @click="editService(service)" >Edit Service</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="new-service py-4">
            <a v-if="!addingService" class="inline-block bg-kma text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="openNewServicePanel" >Add a Service</a>
            <div v-if="addingService" class="bg-grey-lightest rounded p-4" >
                <h2 class="font-normal mb-2">New Service</h2>
                <form class="form-inputs flex flex-wrap">
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
                            <input type="checkbox" name="service_featured" v-model="newService.featured">
                            Feature on the Home page?
                        </label>
                    </div>
                    <div class="w-full px-1 py-4">
                        <div class="dropbox">
                            <input type="file" @change="filesChange($event.target.name, $event.target.files);" accept="image/*" class="input-file">
                            <p v-if="isInitial">
                                Drag your file(s) here to begin<br> or click to browse
                            </p>
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
                addingService: false,
                newService: {},
                editingService: null,
                isInitial: true
            }
        },
        mounted() {
            window.axios.get('/api/services')
                .then(response => {
                    this.services = response.data
                });

        },
        methods: {
            openService(service, index){
                this.editingService = index;
            },
            editService(service, index){
                this.services[index] = service;
                this.editingService = null;
            },
            closeService(){
                this.editingService = null;
            },
            deleteService(service){
                this.services.splice(service, 1)
            },
            openNewServicePanel(){
                this.addingService = true;
            },
            closeNewServicePanel(){
                this.addingService = false;
            },
            addService(){
                this.services.push(this.newService);

                axios.post('/api/services', this.newService)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                this.closeNewServicePanel();
            },
            filesChange(name,file){
                this.isInitial = false;
                console.log(name);
                console.log(file);
            }
        }

    }
</script>
