@extends('layouts.app')
@section('content')
    @include('partials.supportheader')
    <div class="content">
        <div class="container mx-auto">
            <div class="flex flex-wrap p-4 md:my-10" >
                <div class="w-full md:w-1/4 py-2" >
                    <div class="photo-container bg-grey-lightest mb-4">
                    <img src="/storage/{{ $service->photo_url }}" >
                    </div>
                </div>
                <div class="w-full md:w-3/4 px-4 md:px-10">
                    <h1 class="title text-brand-darker text-4xl">{{$service->title}}</h1>
                    <p class="subtitle text-brand-darker text-2xl mb-4">{{$service->subtitle}}</p>
                    <span class="block md:inline-block text-grey-darkest text-2xl font-bold mb-2 md:pr-3">${{$service->rate}}</span>
                    <span class="block md:inline-block italic text-xs text-grey-darkest mb-4">{{$service->rate_info}}</span>
                    <p class="text-grey-darker leading-loose">{{$service->description}}</p>
                    <div class="text-center md:text-left py-4" >
                        <span class="block sm:inline-block px-1"><a class="button-brand" href="#">Book Now</a></span>
                        <span class="block sm:inline-block px-1 pt-2"><a class="button-brand-outlined" href="/trips-rates/">More Services</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection