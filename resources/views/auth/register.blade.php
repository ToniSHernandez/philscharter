@extends('layouts.blank')

@section('content')
    <div class="w-full max-w-md md:mx-auto">
        <div class="shadow p-4 text-center">
        <div class="text-xl text-grey-dark p-4">
            <img src="https://keriganmarketing.com/wp-content/themes/kma/img/kerigan-marketing-logo-color.png" class="my-4" >
            <p>Website Registration</p>
        </div>
        <div class="bg-white p-3 rounded-b mt-2">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="flex items-stretch mb-3">
                    <div class="flex flex-col w-full">
                        <input id="name" type="text"
                               class="flex-grow h-8 px-2 border rounded {{ $errors->has('name') ? 'border-red-dark' : 'border-grey-light' }}"
                               name="name" value="{{ old('name') }}" autofocus placeholder="Name" >
                        {!! $errors->first('name', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                    </div>
                </div>

                <div class="flex items-stretch mb-3">
                    <div class="flex flex-col w-full">
                        <input id="email" type="email"
                               class="flex-grow h-8 px-2 border rounded {{ $errors->has('email') ? 'border-red-dark' : 'border-grey-light' }}"
                               name="email" value="{{ old('email') }}" required placeholder="Email address">
                        {!! $errors->first('email', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                    </div>
                </div>

                <div class="flex items-stretch mb-4">
                    <div class="flex flex-col w-full">
                        <input id="password" type="password"
                               class="flex-grow h-8 px-2 rounded border {{ $errors->has('password') ? 'border-red-dark' : 'border-grey-light' }}"
                               name="password" required placeholder="Password">
                        {!! $errors->first('password', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                    </div>
                </div>

                <div class="flex items-stretch mb-4">
                    <div class="flex flex-col w-full">
                        <input id="password_confirmation" type="password"
                               class="flex-grow h-8 px-2 rounded border {{ $errors->has('password_confirmation') ? 'border-red-dark' : 'border-grey-light' }}"
                               name="password_confirmation" required placeholder="Confirm Password">
                        {!! $errors->first('password_confirmation', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                    </div>
                </div>

                <div class="flex justify-center py-4">
                    <button type="submit"
                            class="button-kma">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
