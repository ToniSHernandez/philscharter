@extends('layouts.app')
@section('content')
    @include('partials.supportheader')
    <div class="content">
        <div class="container mx-auto p-4 md:my-10">
            <div class="px-4 pb-4">
                <h1 class="text-brand-darker mb-3">Request a Trip</h1>
                <p class="leading-normal text-grey-darker">Our online trip request function is a convenient way for you to secure your spot. By submitting the info below you are not booking a trip but rather requesting that time. We review email each afternoon and will reply to you within 24 hours to confirm.</p>
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