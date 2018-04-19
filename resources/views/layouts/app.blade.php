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
        <nav class="w-full bg-white h-16 shadow px-6 md:px-0 relative md:fixed z-20">
            <div class="container mx-auto h-full">
                <div class="flex items-center justify-center h-full">
                    <div class="text-left">
                        @include('partials.logo')
                    </div>
                    <div class="flex-1 text-right">
                        <div class="inline-block lg:hidden">
                            <button class="flex items-center px-3 py-2 border rounded text-brand-darker border-brand-darker hover:text-brand hover:border-brand">
                                <span class="text-blue-darker mr-2 hidden sm:inline-block" >MENU</span>
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                                </svg>
                            </button>
                        </div>
                        <nav class="hidden lg:flex text-center justify-end flex-wrap items-center">
                            <a class="block w-full sm:inline-block sm:w-auto my-2 px-3 no-underline uppercase font-bold text-grey-dark text-sm xl:text-base" href="/about" >About</a>
                            <a class="block w-full sm:inline-block sm:w-auto my-2 px-3 no-underline uppercase font-bold text-grey-dark text-sm xl:text-base" href="/services">Charters & Rates</a>
                            <a class="block w-full sm:inline-block sm:w-auto my-2 px-3 no-underline uppercase font-bold text-grey-dark text-sm xl:text-base" href="/reviews">Reviews</a>
                            <a class="block w-full sm:inline-block sm:w-auto my-2 px-3 no-underline uppercase font-bold text-grey-dark text-sm xl:text-base" href="/contact">Contact</a>
                            <a class="rounded-full bg-brand-darker py-3 px-4 no-underline font-bold text-white uppercase mx-3 my-2 text-sm xl:text-base" href="/contact">Request a Trip</a>
                            <a class="facebook inline-block h-10" href="https://www.facebook.com/#" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.02 34.02" class="h-10" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                    <path fill="#43609C" d="M17,34A17,17,0,1,0,0,17,17,17,0,0,0,17,34"></path>
                                                <path fill="#FFF" d="M12.9,14.13h1.76V12.42a4.57,4.57,0,0,1,.57-2.64A3.13,3.13,0,0,1,18,8.5a11.05,11.05,0,0,1,3.15.32l-.44,2.6a5.94,5.94,0,0,0-1.42-.21c-.68,0-1.3.25-1.3.93v2h2.8l-.2,2.54H18v8.84h-3.3V16.67H12.9Z"></path>
                                </svg>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>

        <div class="mid flex-grow md:pt-10">
        @yield('content')
        </div>

        <div class="bot bg-brand-darker py-6">
            <div class="container mx-auto">
                <nav class="text-center flex justify-center flex-wrap items-center">
                    <a class="block w-full sm:inline-block sm:w-auto my-2 px-3 no-underline uppercase font-bold text-white" href="/about" >About</a>
                    <a class="block w-full sm:inline-block sm:w-auto my-2 px-3 no-underline uppercase font-bold text-white" href="/services">Charters & Rates</a>
                    <a class="block w-full sm:inline-block sm:w-auto my-2 px-3 no-underline uppercase font-bold text-white" href="/reviews">Reviews</a>
                    <a class="block w-full sm:inline-block sm:w-auto my-2 px-3 no-underline uppercase font-bold text-white" href="/contact">Contact</a>
                    <a class="rounded-full bg-white py-3 px-4 no-underline font-bold text-brand-darker uppercase mx-3 my-2" href="/contact">Request a Trip</a>
                </nav>
            </div>
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
