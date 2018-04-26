<template>
<div>
    <div>
        <input type="hidden" name="_token" :value="csrf">
        <input type="text" v-model="name" class="border" placeholder="name" />
        <input type="text" v-model="phone" class="border" placeholder="phone" />
    </div>
    <div>
        <input type="text" v-model="email" class="border" placeholder="email" />
    </div>
    <div>
        <label v-for="service in services" :key="service.id">
            <input type="radio" v-model="service_id":value="service.id" />
            {{ service.title }}
        </label>
    </div>
    <div>
        <label class="text-white font-bold text-center block text-xs">Desired trip date:</label>
        <flat-pickr
            v-model="requested_date"
            :config="config"
            class="border"
            placeholder="Select a date"
        />
        <input
            type="number"
            class="border"
            v-model="guests"
            value=1
            placeholder="number of guests"
        />
    </div>
    <div>
        <textarea v-model="comments" cols="30" rows="10" class="border bg-yellow"></textarea>
        <button class="btn rounded bg-pink p-4 h-16 flex items-center" type="submit" @click="submitMeow">SUBMIT THIS RIGHT MEOW</button>
    </div>
    <div>
        <p>{{ message }}</p>
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
                service_id: 0,
                requested_date: null,
                guests: null,
                comments: null,
                services: [],
                message: '',
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
                    this.name = '',
                    this.phone = '',
                    this.email = '',
                    this.service_id = '',
                    this.requested_date = '',
                    this.guests = '',
                    this.comments = ''
                })
                .catch(err => {
                    alert('an error occured');
                })
            }
        },
        components: {
            flatPickr
        }
    }
</script>
