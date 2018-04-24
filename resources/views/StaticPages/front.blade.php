@extends('layouts.app')
@section('content')
    <div class="mast relative">
        <section
                class="flex h-48 md:h-64 lg:h-80 xl:h-100 bg-grey-light py-4 bg-cover"
                style="background-image:url('http://www.philscharterservice.com/wp-content/uploads/2016/01/cropped-BOFC_2015_FBBANNER1.jpg')">
        </section>
        <div class="w-full lg:absolute md:pin-t" >
            <div class="container mx-auto">
                <div class="lg:w-1/3 ml-auto" >
                    <mini-form
                        class="sm:rounded-lg p-4 sm:p-8 bg-brand-90 sm:my-6 lg:my-8 xl:my-11"
                        csrf="{{ csrf_token() }}"
                    >
                    </mini-form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.popularservices')
    @include('partials.businessintro')
    @include('partials.featuredreview')
@endsection