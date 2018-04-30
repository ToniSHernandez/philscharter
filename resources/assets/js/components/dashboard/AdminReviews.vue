<template>
    <div>
        <div class="reviews-list border-b border-grey-dark pt-4 pb-3">
            <admin-review v-for="(review, index) in reviews" :key="review.id" :review="review" :index="index" ></admin-review>
        </div>
        <div class="new-review py-4">
            <a v-if="!addingReview" class="button-kma" @click="openNewReviewPanel" >Add a Review</a>
            <div v-if="addingReview" class="bg-grey-lightest rounded p-4" >
                <h2 class="font-normal mb-2">New Review</h2>
                <admin-review-fields :review="newReview" @submitForm="addReview()" @closeForm="closeNewReviewPanel()" ></admin-review-fields>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Reviews",

        data(){
            return {
                reviews:  [],
                addingReview: false,
                newReview: {
                    author: '',
                    body: '',
                    featured: 0,
                    rating: null,
                    source: ''
                },
            }
        },
        mounted() {
            window.axios.get('/api/reviews')
                .then(response => {
                    this.reviews = response.data
                });

        },
        methods: {
            openNewReviewPanel(){
                this.addingReview = true;
            },
            closeNewReviewPanel(){
                this.addingReview = false;
            },
            addReview(){
                this.reviews.push(this.newReview);

                axios.post('/api/reviews', this.newReview)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                this.newReview = {};
                this.closeNewReviewPanel();
            }
        }

    }
</script>
