@extends('layouts.app')
@section('content')
    <section class="flex lg:h-64 bg-brand-darker py-4 bg-image-full">
        {{--@include('partials.quick-search')--}}
    </section>
    @include('partials.popularservices')
    @include('partials.businessintro')
    @include('partials.featuredreview')
@endsection