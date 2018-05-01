<template>
    <div>
        <div class="services-list border-b border-grey-dark pt-4 pb-3">
            <admin-service v-for="(service, index) in services" :key="service.id" :service="service" :index="index" ></admin-service>
        </div>
        <div class="new-service py-4">
            <a v-if="!addingService" class="inline-block bg-kma text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="openNewServicePanel" >Add a Service</a>
            <div v-if="addingService" class="bg-grey-lightest rounded p-4" >
                <h2 class="font-normal mb-2">New Service</h2>
                <admin-service-fields :service="{}" @submitForm="addService($event)" @closeForm="closeNewServicePanel()" ></admin-service-fields>
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
            addService(serviceData){
                this.services.push(serviceData);
                let formData = new FormData();
                Array.from(Object.keys(serviceData)).map(serviceName => {
                    formData.append(serviceName, serviceData[serviceName])
                });
                axios.post('/api/services', formData)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                this.closeNewServicePanel();
            }
        }
    }
</script>
