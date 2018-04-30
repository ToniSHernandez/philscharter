<template>
    <div>
        <div v-if="editingReview !== index" class="p-2 mb-1 bg-grey-lighter rounded flex flex-wrap justify-between items-center" >
            <p class="text-grey-darkest">{{ review.author }}</p>
            <div class="actions flex items-center">
                <a @click="openReview(review, index)" class="button-edit-xs mr-1" >edit</a>
                <a @click="deleteReview(review, index)" class="button-delete-xs" >delete</a>
            </div>
        </div>
        <div v-if="editingReview === index" class="bg-grey-lightest rounded p-4 mb-1" >
            <admin-review-fields :review="review" @submitForm="editReview($event)" @closeForm="closeReview()" ></admin-review-fields>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Review",

        props: {
            index: {
                type: Number,
                default: this.index
            },
            review: {
                type: Object,
                default: this.review
            }
        },

        data(){
            return {
                reviews:  [],
                editingReview: null
            }
        },

        methods: {
            openReview(review, index){
                this.editingReview = index;
            },

            editReview(data){
                axios.patch('/api/reviews/' + data.id, data)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                this.closeReview();

            },
            closeReview(){
                this.editingReview = null;
            },
            deleteReview(review){
                this.reviews.splice(review, 1)
            }
        }
    }
</script>

<style scoped>

</style>