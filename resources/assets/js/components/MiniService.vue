<template>
    <div>
        <div class="rounded h-full bg-white overflow-hidden shadow" >
            <div
                class="photo h-48 bg-cover"
                :style="{
                    'background-image':'url(http://www.philscharterservice.com/wp-content/uploads/2017/11/Port-St-Joe-Redfish-4324-800x576.jpg)'
                }"
            ></div>
            <div class="p-4 text-center">
                <p class="text-brand-darker font-bold mt-4">Half-Day Inshore Trip</p>
                <p class="text-brand-darker font-bold mb-4">2 Person</p>
                <p class="price text-grey-darkest text-2xl font-bold mb-2">$400</p>
                <p class="italic text-xs text-grey-darkest mb-2">$50 each additional person</p>
                <a class="button-outlined my-4" href="/charters-rates#half-day-inshore-trip">View Details</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MiniService"
    }
</script>

<style scoped>

</style>