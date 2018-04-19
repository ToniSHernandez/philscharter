<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="h-screen text-grey-darkest bg-grey-darkest">
<div id="app" class="flex flex-col min-h-full">
    <nav class="bg-white h-12 shadow px-0">
        <div class="container mx-auto h-full">
            <div class="flex items-center justify-center h-12 px-2">
                <div class="mr-6">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.5 8.7" class="h-3 mr-3 ml-1">
                        <path fill="#b4be35" d="M6.4,0.1c0,0,0.1,0.3,0.2,0.9c1,3,3,5.6,5.7,7.2l-0.1,0.5c0,0-0.4-0.2-1-0.4C7.7,7,3.7,7,0.2,8.5L0.1,8.1 c2.8-1.5,4.8-4.2,5.7-7.2C6,0.4,6.1,0.1,6.1,0.1H6.4L6.4,0.1z"></path>
                    </svg>Dashboard
                </div>
                <div class="flex-1 text-right">
                    <div class="inline-block lg:hidden">
                        <button class="flex items-center px-3 py-2 border rounded text-kma border-kma">
                            <span class="text-grey-dark mr-2 hidden sm:inline-block" >MENU</span>
                            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                            </svg>
                        </button>
                    </div>
                    <nav class="hidden lg:flex justify-end" >
                        <a class="no-underline hover:underline text-grey-darker text-sm mr-2" href="{{ url('/') }}">Back to website</a>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline text-grey-darker text-sm"
                           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                    </nav>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="mid flex-grow">
        @yield('content')
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>