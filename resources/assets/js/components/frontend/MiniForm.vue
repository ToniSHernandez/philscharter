<template>
    <div>
        <div v-if="hasServices">
            <form action="/trip-request" method="get">
                <input type="hidden" name="_token" :value="csrf">
                <h2 class="font-bold text-white uppercase lg:text-3xl xl:text-4xl mb-4 text-center">Request a Trip</h2>
                <div class="flex">
                    <div class="w-1/2 p-2">
                        <label class="text-white font-bold text-center block text-xs">Desired trip date:</label>
                        <flat-pickr
                            v-model="date"
                            :config="config"
                            name="requested_date"
                            class="rounded-full border border-brand text-sm w-full text-white h-10 my-1 px-4 bg-red-darker"
                            placeholder="Select a date"
                        />
                    </div>
                    <div class="w-1/2 p-2">
                        <label class="text-white font-bold text-center block text-xs">Number of guests:</label>
                        <input
                            type="number"
                            class="rounded-full border border-brand w-full text-sm text-white h-10 my-1 px-4 bg-red-darker"
                            name="guests"
                            value="1"
                        >
                    </div>
                </div>
                <div class="flex flex-wrap pt-2 pb-4 px2 lg:px-4 xl:px-6">
                    <div class="w-full md:w-1/2 lg:w-full flex text-white items-center font-bold my-2" v-for="service in services" :key="service.id">
                        <label @click="selectedService = service.id" class="cursor-pointer flex items-center">
                            <input type="radio" name="service_id" class="hidden" :value="service.id">
                            <span
                                class="inline-block rounded-full h-5 w-5 border border-brand mr-2"
                                :class="{
                                    'bg-white': selectedService === service.id,
                                    'bg-brand-darkest': selectedService !== service.id
                                }"
                            >
                            </span>
                            <span>{{ service.title }}</span>
                        </label>
                    </div>
                </div>
                <div class="text-center">
                    <button class="bg-white rounded-full text-brand font-bold text-lg uppercase py-4 px-6 shadow">Let's Go!</button>
                </div>
            </form>
        </div>
        <div v-else>
            <h2 class="font-bold text-white uppercase lg:text-3xl xl:text-4xl mb-4 text-center">There are no trips available at this time</h2>
        </div>
    </div>
</template>

<script>
    import flatPickr from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';

    export default {
        props: {
            csrf: {
                type: String,
                default: this.csrf
            }
        },
        data () {
            return {
                date: null,
                config: {
                    altFormat: "F j, Y",
                    altInput: true
                },
                services: [],
                hasServices: true,
                errorMessage: '',
                selectedService: null
            }
        },
        mounted() {
            axios.get('/api/featured-services')
                .then(response => {
                    this.services = response.data
                })
                .catch(err => {
                    this.hasServices = false;
                });
        },
        components: {
            flatPickr
        }
    }
</script>
