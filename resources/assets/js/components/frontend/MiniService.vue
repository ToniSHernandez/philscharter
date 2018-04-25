<template>
    <div>
        <div class="rounded h-full bg-white overflow-hidden shadow" >
            <div
                class="photo h-48 bg-cover bg-grey-lightest"
                :style="{
                    'background-image':'url(' + service.photo_url + ')'
                }"
            ></div>
            <div class="p-4 text-center">
                <p class="text-brand-darker font-bold mt-4">{{service.title}}</p>
                <p class="text-brand-darker font-bold mb-4">{{service.subtitle}}</p>
                <p class="price text-grey-darkest text-2xl font-bold mb-2">${{service.rate}}</p>
                <p class="italic text-xs text-grey-darkest mb-2">{{service.rate_info}}</p>
                <p class="my-4"><a class="button-brand-outlined" :href="'/trips-rates/' + service.slug">View Details</a></p>
                <p class="mb-4"><a class="button-brand" href="#">Book Now</a></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MiniService",

        props: {
            service: {
                type: Object,
                default: {}
            }
        }
    }
</script>

<style scoped>

</style>