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
<body class="bg-white h-screen">
    <div id="app" class="flex flex-col min-h-full">
        <nav class="bg-white h-16 shadow px-6 md:px-0">
            <div class="container mx-auto h-full">
                <div class="flex items-center justify-center h-full">
                    <div class="mr-6">
                        @include('partials.logo')
                    </div>
                    <div class="flex-1 text-right">

                    </div>
                </div>
            </div>
        </nav>

        <div class="mid flex-grow">
        @yield('content')
        </div>

        <div class="bot bg-brand-darker">
            <nav class="">
            </nav>
        </div>
        <div class="bot-bot bg-brand-darkest text-center py-4">
            <p class="text-white text-xs">&copy; @php echo date('Y'); @endphp {{ config('app.name', 'Business Name') }}. All&nbsp;rights&nbsp;reserved | <a class="text-white" href="/dashboard/">Dashboard</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.5 8.7" class="h-2 ml-3">
                    <path fill="#b4be35" d="M6.4,0.1c0,0,0.1,0.3,0.2,0.9c1,3,3,5.6,5.7,7.2l-0.1,0.5c0,0-0.4-0.2-1-0.4C7.7,7,3.7,7,0.2,8.5L0.1,8.1 c2.8-1.5,4.8-4.2,5.7-7.2C6,0.4,6.1,0.1,6.1,0.1H6.4L6.4,0.1z"></path>
                </svg> <a class="text-white no-underline" href="https://keriganmarketing.com" target="_blank" >Site by KMA</a>.
            </p>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
