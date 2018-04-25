<template>
    <div>
        <mini-service v-for="service in services" :key="service.id" class="w-full sm:w-1/2 lg:w-1/4 pb-4 px-4 sm:pt-4" :service="service" ></mini-service>
    </div>
</template>

<script>
    export default {
        name: "Services",

        props: {
            filter: {
                type: String,
                default: null
            }
        },

        data () {
            return {
                services: [],
                hasServices: true,
            }
        },

        mounted() {
            axios.get('/api/' + (this.filter !== null ? this.filter + '-' : '') + 'services')
                .then(response => {
                    this.services = response.data
                })
                .catch(err => {
                    this.hasServices = false;
                    console.log(err.response);
                });
        }
    }
</script>

<style scoped>

</style>