@extends('layouts.blank')

@section('content')
    <div class="w-full max-w-md md:mx-auto">
        <div class="shadow p-4 text-center">
            <div class="text-xl text-grey-dark p-4">
                <img src="https://keriganmarketing.com/wp-content/themes/kma/img/kerigan-marketing-logo-color.png"
                     class="my-4">
                <p>Dashboard Login</p>
            </div>
            <div class="bg-white p-3 mt-2">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="flex items-stretch mb-3">
                        <div class="flex flex-col w-full">
                            <input id="email" type="email"
                                   class="flex-grow h-8 px-2 border rounded {{ $errors->has('email') ? 'border-red-dark' : 'border-grey-light' }}"
                                   name="email" value="{{ old('email') }}" required autofocus
                                   placeholder="Email Address">
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

                    <div class="flex mb-4">
                        <label class="w-full ml-auto">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span
                                    class="text-sm text-grey-dark"> Remember Me</span>
                        </label>
                    </div>

                    <div class="flex">
                        <div class="w-full ml-auto">
                            <button type="submit"
                                    class="button-kma my-4">
                                Login
                            </button>
                            <p class="my-4"><a class="no-underline hover:underline text-brand-dark text-sm ml-4"
                                               href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a></p>
                            <p><a class="text-xs text-grey" href="/">Go Back</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
