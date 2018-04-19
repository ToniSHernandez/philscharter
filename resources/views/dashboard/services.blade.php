@extends('layouts.admin')

@section('content')
    <div class="container mx-auto h-full py-2 px-2">
        <div class="flex pb-1 border-b border-grey-dark items-end justify-between">
            <h1 class="text-white text-5xl font-normal mt-4">Services</h1>
            <a href="/dashboard" class="bg-kma text-white rounded-full text-sm inline-block py-1 px-3 no-underline mb-2" >Dashboard</a>
        </div>
        <div class="flex flex-col">
            <services></services>
        </div>

    </div>
@endsection
