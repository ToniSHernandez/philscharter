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
    <nav class="bg-white h-12 shadow px-6 md:px-0">
        <div class="container mx-auto h-full">
            <div class="flex items-center justify-center h-12">
                <div class="mr-6">
                    Dashboard
                </div>
                <div class="flex-1 text-right">
                    <a class="no-underline hover:underline text-grey-darker text-sm mr-2" href="{{ url('/') }}">Back to website</a>

                    <a href="{{ route('logout') }}"
                       class="no-underline hover:underline text-grey-darker text-sm"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
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