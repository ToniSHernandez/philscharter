<template>
    <div>
        <div class="reviews-list border-b border-grey-dark pt-4 pb-3">
            <div v-for="(review, index) in reviews" >
                <div v-if="editingService !== index" class="p-2 mb-1 bg-grey-lighter rounded flex flex-wrap justify-between items-center" >
                    <p class="text-grey-darkest">{{ review.author }}</p>
                    <div class="actions flex items-center">
                        <a @click="openReview(review, index)" class="bg-grey-darker text-sm rounded-full no-underline py-1 px-2 cursor-pointer mx-1 text-white" >edit</a>
                        <a @click="deleteReview(review, index)" class="bg-red text-sm rounded-full no-underline py-1 px-2 cursor-pointer mx-1 text-white" >delete</a>
                    </div>
                </div>
                <div v-if="editingReview === index" class="bg-grey-lightest rounded p-4 mb-1" >
                    <div class="form-inputs">
                        <textarea v-model="review.body" type="text" class="input-text" placeholder="Review Name" >
                        <input v-model="review.author" type="text" class="input-text" placeholder="Subtitle" >
                    </div>
                    <div class="flex justify-between items-center pt-2">
                        <a class="inline-block bg-grey text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="closeReview" >nevermind</a>
                        <a class="inline-block bg-kma text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="editReview(review)" >Edit Review</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="new-review py-4">
            <a v-if="!addingReview" class="inline-block bg-kma text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="openNewReviewPanel" >Add a Review</a>
            <div v-if="addingReview" class="bg-grey-lightest rounded p-4" >
                <h2 class="font-normal mb-2">New Review</h2>
                <div class="form-inputs">
                    <input v-model="newReview.title" type="text" class="input-text" name="review_name" placeholder="Review Name" >
                    <input v-model="newReview.subtitle" type="text" class="input-text" name="review_subtitle" placeholder="Subtitle" >
                    <input v-model="newReview.rate" type="text" class="input-text" name="review_price" placeholder="Price" >
                </div>
                <div class="flex justify-between items-center pt-2">
                    <a class="inline-block bg-grey text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="closeNewReviewPanel" >nevermind</a>
                    <a class="inline-block bg-kma text-white rounded-full py-2 px-3 no-underline cursor-pointer" @click="addReview" >Add Review</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                reviews:  [],
                addingReview: false,
                newReview: {},
                editingReview: null
            }
        },
        mounted() {
            window.axios.get('/reviews')
                .then(response => {
                    this.reviews = response.data
                });

        },
        methods: {
            openReview(review, index){
                this.editingReview = index;
            },
            editReview(review, index){
                this.reviews[index] = review;
                this.editingReview = null;
            },
            closeReview(){
                this.editingReview = null;
            },
            deleteReview(review){
                this.reviews.splice(review, 1)
            },
            openNewReviewPanel(){
                this.addingReview = true;
            },
            closeNewReviewPanel(){
                this.addingReview = false;
            },
            addReview(){
                this.reviews.push(this.newReview);

                axios.post('/addreview', this.newReview)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                this.closeNewReviewPanel();
            }
        }

    }
</script>
