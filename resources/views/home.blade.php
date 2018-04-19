@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto h-full py-2 px-1">
        <div class="flex items-center justify-center flex-wrap">
            <div class="h-32 w-1/2 sm:w-1/3 h-8 flex-grow p-1" >
                <a class="h-full flex flex-col items-center justify-center bg-grey-dark text-white text-lg uppercase no-underline hover:bg-grey-darker" href="#" >Leads</a>
            </div>
            <div class="h-32 w-1/2 sm:w-1/3 h-8 flex-grow p-1" >
                <a class="h-full flex flex-col items-center justify-center bg-grey-dark text-white text-lg uppercase no-underline hover:bg-grey-darker" href="#" >Reviews</a>
            </div>
            <div class="h-32 w-1/2 sm:w-1/3 h-8 flex-grow p-1" >
                <a class="h-full flex flex-col items-center justify-center bg-grey-dark text-white text-lg uppercase no-underline hover:bg-grey-darker" href="#" >Services</a>
            </div>
            <div class="h-32 w-1/2 sm:w-1/3 h-8 flex-grow p-1" >
                <a class="h-full flex flex-col items-center justify-center bg-grey-dark text-white text-lg uppercase no-underline hover:bg-grey-darker" href="#" >Home page</a>
            </div>
            <div class="h-32 w-1/2 sm:w-1/3 h-8 flex-grow p-1" >
                <a class="h-full flex flex-col items-center justify-center bg-grey-dark text-white text-lg uppercase no-underline hover:bg-grey-darker" href="#" >About page</a>
            </div>
            <div class="h-32 w-1/2 sm:w-1/3 h-8 flex-grow p-1" >
                <a class="h-full flex flex-col items-center justify-center bg-grey-dark text-white text-lg uppercase no-underline hover:bg-grey-darker" href="#" >Contact info</a>
            </div>
        </div>
    </div>
@endsection
