@extends('layouts.app')
@section('content')
    <div class="mast relative">
        <section
                class="flex h-48 md:h-64 lg:h-80 xl:h-100 bg-grey-light py-4 bg-cover"
                style="background-image:url('http://www.philscharterservice.com/wp-content/uploads/2016/01/cropped-BOFC_2015_FBBANNER1.jpg')">
        </section>
        <div class="w-full lg:absolute md:pin-t z-10" >
            <div class="container mx-auto">
                <div class="lg:w-1/3 ml-auto" >
                    @include('partials.mini-bookingform')
                </div>
            </div>
        </div>
    </div>
    @include('partials.popularservices')
    @include('partials.businessintro')
    @include('partials.featuredreview')
@endsection