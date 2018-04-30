<template>
    <div>
        <div class="form-inputs">
            <div class="flex flex-wrap">
                <div class="w-full">
                    <textarea v-model="localReview.body" type="text" class="input-text" placeholder="Review text" ></textarea>
                </div>
                <div class="w-full">
                    <input v-model="localReview.author" type="text" class="input-text" placeholder="Author name" />
                </div>
                <div class="w-full">
                    <input v-model="localReview.source" type="text" class="input-text" placeholder="Review source (Google, Facebook, etc)" />
                </div>
                <div class="w-full">
                    <input v-model="localReview.rating" type="hidden" class="input-text" />
                    <div class="flex justify-start items-center">
                        <span class="inline-block font-bold mr-3">Rating: </span>
                        <span class="inline-block h-8 w-8 pt-1 border border-grey-darker my-3 mx-1 cursor-pointer rounded-full text-center leading-normal"
                              :class="{
                                'bg-kma': localReview.rating === 1,
                                'text-white': localReview.rating === 1
                              }"
                              @click="setRating(1)"
                        >1</span>
                        <span class="inline-block h-8 w-8 pt-1 border border-grey-darker my-3 mx-1 cursor-pointer rounded-full text-center leading-normal"
                              :class="{
                                'bg-kma': localReview.rating === 2,
                                'text-white': localReview.rating === 2
                              }"
                              @click="setRating(2)"
                        >2</span>
                        <span class="inline-block h-8 w-8 pt-1 border border-grey-darker my-3 mx-1 cursor-pointer rounded-full text-center leading-normal"
                              :class="{
                                'bg-kma': localReview.rating === 3,
                                'text-white': localReview.rating === 3
                              }"
                              @click="setRating(3)"
                        >3</span>
                        <span class="inline-block h-8 w-8 pt-1 border border-grey-darker my-3 mx-1 cursor-pointer rounded-full text-center leading-normal"
                              :class="{
                                'bg-kma': localReview.rating === 4,
                                'text-white': localReview.rating === 4
                              }"
                              @click="setRating(4)"
                        >4</span>
                        <span class="inline-block h-8 w-8 pt-1 border border-grey-darker my-3 mx-1 cursor-pointer rounded-full text-center leading-normal"
                              :class="{
                                'bg-kma': localReview.rating === 5,
                                'text-white': localReview.rating === 5
                              }"
                              @click="setRating(5)"
                        >5</span>
                        <span class="ml-3" >stars</span>
                    </div>
                </div>
                <div class="w-full pb-4">
                    <input v-model="localReview.featured" type="checkbox" id="featured" >
                    <label for="featured">Feature on the Home page?</label>
                </div>
            </div>
        </div>
        <div class="flex justify-between items-center pt-2">
            <a class="button-kma" @click="$emit('submitForm',localReview)" >Edit Review</a>
            <a class="button-grey" @click="$emit('closeForm')" >nevermind</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ReviewFields",

        props: {
            review: {
                type: Object,
                default: {}
            }
        },

        data(){
            return {
                localReview: {}
            }
        },

        mounted(){
            this.localReview = this.review;
        },

        methods: {
            setRating(number){
                this.localReview.rating = number;
            }
        }
    }
</script>

<style scoped>

</style>