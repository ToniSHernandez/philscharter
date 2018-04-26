<template>
    <div>
        <div class="flex my-2 justify-center items-center flex-wrap">
            <div class="quote text-right text-brand-darker">
                &ldquo;
            </div>
            <div class="max-w-full lg:max-w-lg px-2">
                <p class="review-post">
                    {{ review.body }}
                </p>
            </div>
            <div class="quote text-left text-brand-darker">
                &rdquo;
            </div>
        </div>
        <p class="reviewer font-semibold italic pb-6">
            {{ review.author }}
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
        }
    }
</script>

<style scoped>

</style>