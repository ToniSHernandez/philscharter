@extends('layouts.app')
@section('content')
    @include('partials.supportheader')
    <div class="content">
        <div class="container mx-auto p-4 md:my-10">
            <div class="px-4 pb-4">
                <h1 class="text-brand-darker mb-3">Trips & Rates</h1>
                <p class="leading-normal text-grey-darker mb-3">I fish out of a 2008 23-foot Ranger bay boat powered by a
                    2017 Suzuki 300. Fishing trips include rod, reels, all tackle, bait, license, fish cleaned and
                    bagged!</p>
                <p class="leading-normal text-grey-darker mb-3">Half day trips are the most popular. There’s no long run to
                    the fish, and the waters usually clear and calm in pristine St. Joe Bay. Scallop trips are great
                    family fun— it’s like an Easter egg hunt in the clear shallow water of the bay.</p>
            </div>
            <services class="flex flex-wrap"></services>
        </div>
    </div>
@endsection