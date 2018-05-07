<template>
<div>
    <div v-if="message!==''">
        <p class="text-center font-bold p-4 border border-green bg-green-lightest m-4 rounded text-green-dark">{{ message }}</p>
    </div>
    <div class="flex flex-wrap justify-center items-center text-left py-4">
        <input type="hidden" name="_token" :value="csrf">
        <div class="w-full md:w-1/3 p-4" >
            <input type="text" v-model="name" class="input-text" placeholder="Name*" @keyup="checkFormStatus()" />
        </div>
        <div class="w-full md:w-1/3 p-4" >
            <input type="text" v-model="phone" class="input-text" placeholder="Phone number*" @keyup="checkFormStatus()" />
        </div>
        <div class="w-full md:w-1/2 p-4" >
            <input type="text" v-model="email" class="input-text" placeholder="Email address*" @keyup="checkFormStatus()" />
        </div>
    </div>
    <div class="flex flex-wrap justify-center items-center text-left py-4">
        <label class="w-full text-center text-grey-darker my-1">Trip type*</label>
        <div class="w-full md:w-auto flex items-center justify-center font-bold m-2 px-2" v-for="service in services" :key="service.id">
            <label @click="service_id = service.id" class="cursor-pointer flex items-center">
                <input type="radio" name="service_id" class="hidden" v-model="service_id" :value="service.id" @keyup="checkFormStatus()" />
                <span
                        class="inline-block rounded-full h-5 w-5 border border-grey-dark mr-2"
                        :class="{
                                    'bg-white': service_id != service.id,
                                    'bg-brand-darkest': service_id == service.id
                                }"
                ></span>
                <span>{{ service.title }}</span>
            </label>
        </div>
    </div>
    <div class="flex flex-wrap justify-center items-center text-left py-4">
        <div class="w-full md:w-1/3 p-4" >
            <label class="block text-grey-darker my-1">Desired trip date:*</label>
            <flat-pickr
                v-model="requested_date"
                :config="config"
                class="input-text"
                placeholder="Select a date"
                @keyup="checkFormStatus()"
            />
        </div>
        <div class="w-full md:w-1/3 p-4" >
            <label class="block text-grey-darker my-1">Number of guests:*</label>
            <input
                type="number"
                class="input-text"
                v-model="guests"
                @keyup="checkFormStatus()"
            />
        </div>
        <div class="w-full md:w-2/3 p-4" >
            <label class="block text-grey-darker my-1">Anything else should we know?</label>
            <textarea v-model="comments" cols="30" rows="5" class="input-textarea" @keyup="checkFormStatus()"></textarea>
        </div>
    </div>
    <div class="text-center">
        <p v-if="!readyToSubmit" class="text-grey-dark italic mb-2">Fill out required fields to submit.</p>
        <button v-if="readyToSubmit" class="button-brand" type="submit" @click="submitMeow">Request Trip</button>
        <button v-if="!readyToSubmit" class="button-md bg-grey cursor-default border border-grey" disabled>Request Trip</button>
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
            },
            dataRequestedDate: {
                type: String,
                default: null
            },
            dataGuests: {
                type: String,
                default: null
            },
            dataServiceId: {
                type: String,
                default: null
            }
        },
        data () {
            return {
                name: '',
                phone: '',
                email: '',
                service_id: null,
                requested_date: null,
                guests: null,
                comments: null,
                services: [],
                message: '',
                readyToSubmit: false,
                config: {
                    altFormat: "F j, Y",
                    altInput: true
                }
            }
        },
        mounted() {
            this.requested_date = this.dataRequestedDate;
            this.guests = this.dataGuests;
            this.service_id = this.dataServiceId;
            this.getServices();
        },
        methods: {
            getServices() {
                axios.get('/api/services')
                    .then(response => {
                        this.services = response.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                    });
            },
            submitMeow () {
                axios.post('api/service-requests', {
                    name: this.name,
                    phone: this.phone,
                    email: this.email,
                    service_id: this.service_id,
                    requested_date: this.requested_date,
                    guests: this.guests,
                    comments: this.comments
                })
                .then(response => {
                    this.message = 'Success!';
                    this.name = '';
                    this.phone = '';
                    this.email = '';
                    this.service_id = '';
                    this.requested_date = '';
                    this.guests = '';
                    this.comments = '';
                    this.message = 'Thank you for requesting a trip with us. Please allow 24 hours for us to find the closest time slot available and get back with you.'
                    this.readyToSubmit = false;
                })
                .catch(err => {
                    console.log(err);
                    alert('an error occured');
                })
            },
            checkFormStatus(){
                if( this.name != ''
                    && this.phone != ''
                    && this.email != ''
                    && this.service_id != 0
                    && this.requested_date != null
                    && this.guests != null
                ){
                    this.readyToSubmit = true;
                }else{
                    this.readyToSubmit = false;
                }
            }
        },
        components: {
            flatPickr
        }
    }
</script>
