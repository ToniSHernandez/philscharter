@extends('layouts.app')
@section('content')
    @include('partials.supportheader')
    <div class="content">
        <div class="container mx-auto p-4 md:my-10">
            <div class="px-4 pb-4">
                <h1 class="text-brand-darker mb-3">Photo Gallery</h1>
            </div>
            <photo-albums class="flex flex-wrap"></photo-albums>
        </div>
    </div>
@endsection