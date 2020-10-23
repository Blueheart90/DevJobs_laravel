<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    @yield('styles')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen leading-none">
    @if(session('estado'))
        <div class="bg-teal-500 p-8 text-center text-white font-bold uppercase">
            {{ session('estado') }}
        </div>
    @endif
    <div id="app">
        <nav class="bg-gray-800 shadow-md py-2">
            <div class="container mx-auto md:px-0">
               <div class="flex items-center justify-around">

                    <svg style="width:50px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>

                    <a class="text-2xl text-white" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>


                    <nav class="flex-1 text-right">
                        <!-- Right Side Of Navbar -->
                            <!-- Authentication Links -->
                            @guest

                                <a class="text-white no-underline hover:underline hover:text-gray-300 p-3" href="{{ route('login') }}">{{ __('Login') }}</a>

                                @if (Route::has('register'))
                                    <a class="text-white no-underline hover:underline hover:text-gray-300 p-3" href="{{ route('register') }}">{{ __('Register') }}</a>

                                @endif
                            @else
                                <span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</span>

                                <a
                                    href="{{ route('notificaciones') }}"
                                    class="bg-teal-500 rounded-full mr-2 px-3 py-1 font-bold text-sm text-white"
                                >
                                    {{ Auth::user()->unreadNotifications->count() }}
                                </a>

                                <a class="text-white no-underline hover:underline hover:text-gray-300 text-sm p-3" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                    </nav>
               </div>
            </div>
        </nav>
        <div class="bg-gray-700 border-b-4 border-teal-500">
            <nav class="container mx-auto flex flex-col text-center md:flex-row space-x-1">
                @yield('navegacion')
            </nav>
        </div>
        <main class="mt-10 container mx-auto">
            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
</html>
