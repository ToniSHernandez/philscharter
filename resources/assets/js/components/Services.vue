<template>
    <div>
        <div class="services-list border-b border-grey-dark pt-4 pb-3">
            <div v-for="(service, index) in services" class="p-2 mb-1 bg-grey-lighter rounded flex flex-wrap justify-between items-center" >
                <p class="text-grey-darkest">{{ service.name }}</p>
                <div class="actions flex items-center">
                    <a @click="openService(index)" class="bg-grey-darker text-sm rounded-full no-underline py-1 px-2 cursor-pointer mx-1 text-white" >edit</a>
                    <a @click="deleteService(index)" class="bg-red text-sm rounded-full no-underline py-1 px-2 cursor-pointer mx-1 text-white" >delete</a>
                </div>
            </div>
        </div>
        <div class="new-service py-4">
            <a v-if="!addingService" class="inline-block bg-kma text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="openNewServicePanel" >Add a Service</a>
            <div v-if="addingService" class="bg-grey-lightest rounded p-4" >
                <h2 class="font-normal mb-2">New Service</h2>
                <div class="form-inputs">
                    <input v-model="newService.name" type="text" class="input-text" name="service_name" placeholder="Service Name" >
                    <input v-model="newService.subtitle" type="text" class="input-text" name="service_subtitle" placeholder="Subtitle" >
                    <input v-model="newService.price" type="text" class="input-text" name="service_price" placeholder="Price" >
                </div>
                <div class="flex justify-between items-center pt-2">
                    <a class="inline-block bg-grey text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="closeNewServicePanel" >nevermind</a>
                    <a class="inline-block bg-kma text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="addService" >Add Service</a>
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
                newService: {}
            }
        },
        mounted() {
            this.services = [
                {
                    'name': 'Test Service',
                    'price': '$100',
                },
                {
                    'name': 'Test Service 2',
                    'price': '$200',
                },
                {
                    'name': 'Test Service 3',
                    'price': '$300',
                }
            ]
        },
        methods: {
            openService(service){
                console.info(this.services[service]);
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
                this.services.push({
                    'name': this.newService.name,
                    'price': this.newService.price
                });
                this.closeNewServicePanel();
            }
        }

    }
</script>
