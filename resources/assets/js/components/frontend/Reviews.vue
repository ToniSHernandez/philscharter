<template>
    <div>
        <review v-for="review in reviews" :key="review.id" class="review text-center leading-loose text-sm text-grey-dark pt-8 pb-6" :review="review" ></review>
    </div>
</template>

<script>
    export default {
        name: "Reviews",

        props: {
            filter: {
                type: String,
                default: null
            }
        },

        data(){
            return {
                reviews: []
            }
        },

        mounted() {
            axios.get('/api/' + (this.filter !== null ? this.filter + '-' : '') + 'reviews')
                .then(response => {
                    this.reviews = response.data
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