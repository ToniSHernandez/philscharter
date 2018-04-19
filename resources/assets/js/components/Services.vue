<template>
    <div>
        <div class="services-list border-b border-grey-dark pt-4 pb-3">
            <div v-for="service in services" class="p-2 mb-1 bg-grey-lighter rounded flex flex-wrap justify-between items-center" >
                <p class="text-grey-darkest">{{ service.name }}</p>
                <div class="actions flex items-center">
                    <a @click="openService(service.id)" class="bg-grey-darker text-sm rounded-full no-underline py-1 px-2 cursor-pointer mx-1 text-white" >edit</a>
                    <a @click="deleteService(service.id)" class="bg-red text-sm rounded-full no-underline py-1 px-2 cursor-pointer mx-1 text-white" >delete</a>
                </div>
            </div>
        </div>
        <div class="new-service py-4">
            <a v-if="!addingService" class="inline-block bg-kma text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="openNewServicePanel" >Add a Service</a>
            <div v-if="addingService" class="bg-grey-lightest rounded p-4" >
                <h2 class="font-normal mb-2">New Service</h2>
                <div class="form-inputs">
                    <input type="text" class="input-text" name="service_name" placeholder="Service Name" >
                    <input type="text" class="input-text" name="service_subtitle" placeholder="Subtitle" >
                    <input type="text" class="input-text" name="service_price" placeholder="Price" >
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
                console.info(this.services[service]);
            },
            openNewServicePanel(){
                this.addingService = true;
            },
            closeNewServicePanel(){
                this.addingService = false;
            },
            addService(){
                console.log('adding service');
            }
        }

    }
</script>
