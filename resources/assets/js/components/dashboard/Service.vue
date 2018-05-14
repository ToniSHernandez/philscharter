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
            <admin-service-fields :service="service" @submitForm="editService($event)" @closeForm="closeService()"></admin-service-fields>
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
                isInitial: true,
                localService: {}
            }
        },
        methods: {
            openService(index){
                this.editingService = index;
            },
            editService(serviceData){
                var formData = new FormData();
                var vm = this;
                formData.append('_method', 'PATCH');
                Array.from(Object.keys(serviceData)).map(serviceName => {
                    formData.append(serviceName, serviceData[serviceName]);
                });
                axios.post('/api/services/' + serviceData.id, formData)
                    .then(function (response) {
                        vm.$emit('updated');
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
            }
        }
    }
</script>