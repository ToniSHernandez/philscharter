@extends('layouts.app')
@section('content')
    @include('partials.supportheader')
    <div class="content">
        <div class="container mx-auto p-4 md:my-10">
            <div class="px-4 pb-4">
                <h1 class="text-brand-darker mb-3">Request a Trip</h1>
                <p class="leading-normal text-grey-darkest font-medium">
                    Our online trip request function is a convenient way for you to secure your spot.
                    <strong>By submitting the info below you are not booking a trip but rather requesting that time.</strong> We review email each afternoon and will reply to you within 24 hours to confirm.
                    <hr>
                    <span class="text-red">If requesting a trip within 24 hours, don’t use this form and call us at <a href="tel:8502479933" class="text-red">850-247-9933.</a></span>
                </p>
                <p class="leading-normal mt-4 text-grey-dark text-center w-full">
                    <small>*You must complete all fields</small>
                </p>

            </div>
            <trip-request
                    class="w-full"
                    data-service-id="{{ $serviceId }}"
                    data-guests="{{ $guests }}"
                    data-requested-date="{{ $requestedDate }}"
                    csrf="{{ csrf_token() }}"
            >
            </trip-request>
        </div>
    </div>
@endsection