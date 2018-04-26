@extends('layouts.app')
@section('content')
<div class="w-full flex p-8 flex-wrap justify-center">
    <trip-request
        class="w-full"
        data-service-id="{{ $serviceId }}"
        data-guests="{{ $guests }}"
        data-requested-date="{{ $requestedDate }}"
        csrf="{{ csrf_token() }}"
    >
    </trip-request>
</div>
@endsection