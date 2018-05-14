<template>
    <div>
        <div class="flex my-2 justify-center items-center flex-wrap">
            <div class="quote text-right text-brand-darker">
                &ldquo;
            </div>
            <div class="max-w-full lg:max-w-lg px-2">
                <p class="review-post text-grey-dark font-medium text-lg leading-normal">
                    {{ review.body }}
                </p>
            </div>
            <div class="quote text-left text-brand-darker">
                &rdquo;
            </div>
        </div>
        <p class="reviewer font-semibold italic pb-6">
            {{ authorString }}
        </p>
    </div>
</template>

<script>
    export default {
        name: "Review",

        props: {
            review: {
                type: Object,
                default: {}
            }
        },

        data(){
            return {
                postedOn: '',
                authorString: ''
            }
        },

        mounted(){
            this.postedOn = this.convertDate(this.review.submitted_on);
            this.authorString = this.buildByLine();
        },

        methods:{
            convertDate(timestamp){
                var jsDate = new Date(timestamp);
                var options = {
                    year: 'numeric',
                    month: 'long'
                };

                return jsDate.toLocaleDateString('en-US', options);
            },
            buildByLine(){
                var newString = this.review.author;

                if(this.review.rating !== 0){
                    newString = newString + ' rated ' + this.review.rating + ' stars ';
                }

                if(this.review.source !== ''){
                    newString = newString + ' on ' + this.review.source;
                }

                if(this.postedOn !== ''){
                    if(this.review.source !== ''){
                        newString = newString + ' in ';
                    }else{
                        newString = newString + ', ';
                    }
                    newString = newString + this.postedOn;
                }

                return newString;
            }
        }


    }
</script>

<style scoped>

</style>