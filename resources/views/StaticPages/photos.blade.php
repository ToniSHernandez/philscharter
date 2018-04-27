@extends('layouts.app')
@section('content')
    @include('partials.supportheader')
    <div class="content">
        <div class="container mx-auto p-4 md:my-10">
            <photo-album class="flex flex-wrap" :data-photos="{{ $photos }}"></photo-albums>
        </div>
    </div>
@endsection