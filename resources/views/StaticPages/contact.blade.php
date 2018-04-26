@extends('layouts.app')
@section('content')
    @include('partials.supportheader')
    <div class="content">
        <div class="container mx-auto p-4 md:my-10">
            <div class="px-4 pb-4">
                <h1 class="text-brand-darker mb-3">Contact Us</h1>
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/3">
                        <p class="leading-normal text-grey-darker mb-3">Most trips leave out of Port St Joe Marina.
                            In the winter, I run some trips out of the White City boat ramp.</p>
                        <p class="leading-normal text-grey-darker mb-3"><strong>Email address:</strong><br><a
                                    href="mailto:pcx17@yahoo.com" class="text-brand">pcx17@yahoo.com</a></p>
                        <p class="leading-normal text-grey-darker mb-3"><strong>Phone number:</strong><br><a
                                    href="tel:850-247-9933" class="no-underline text-brand">(850) 247-9933</a></p>
                        <p class="leading-normal text-grey-darker mb-3"><strong>Port St Joe Marina</strong><br>
                            340 Marina Dr.,<br>Port St. Joe, Fl 32456</p>
                        <p class="leading-normal text-grey-darker mb-3"><strong>White City Public Boat Ramp</strong><br>
                            225 Pridgeon Rd.,<br>Wewahitchka, FL 32465</p>
                    </div>
                    <div class="w-full md:w-2/3 md:px-4">
                        <div class="bg-grey-lightest h-full rounded overflow-hidden border border-grey shadow">
                            <google-map :latitude="29.854097" :longitude="-85.265156" :zoom="15" name="locations" class="h-64 md:h-full" >
                                <pin :latitude="29.8148888" :longitude="-85.3086663" title="Port St Joe Marina">
                                    <p class="leading-normal text-grey-darker mb-3 font-bold">Port St Joe Marina</p>
                                    <p class="leading-normal text-grey-darker mb-3">340 Marina Dr.,<br>Port St. Joe, Fl 32456</p>
                                    <p class="directions-button"><a class="button-brand m-0" target="_blank" href="https://www.google.com/maps/dir//29.8148888,-85.3086663">Get Directions</a></p>
                                </pin>
                                <pin :latitude="29.8810016" :longitude="-85.223682" title="White City Public Boat Ramp">
                                    <p class="leading-normal text-grey-darker mb-3 font-bold">White City Public Boat Ramp</p>
                                    <p class="leading-normal text-grey-darker mb-3">225 Pridgeon Rd.,<br>Wewahitchka, FL 32465</p>
                                    <p class="directions-button"><a class="button-brand m-0" target="_blank" href="https://www.google.com/maps/dir//29.8810016,-85.223682">Get Directions</a></p>
                                </pin>
                            </google-map>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection