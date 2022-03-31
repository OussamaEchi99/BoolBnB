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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    {{-- script mappa --}}
    {{-- <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps-web.min.js'></script> --}}
    
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps-web.min.js'></script>
<<<<<<< HEAD
    {{-- <script> (function(){ window.SS = window.SS || {}; SS.Require = function (callback){ if (typeof callback === 'function') { if (window.SS && SS.EventTrack) { callback(); } else { var siteSpect = document.getElementById('siteSpectLibraries'); var head = document.getElementsByTagName('head')[0]; if (siteSpect === null && typeof head !== 'undefined') { siteSpect = document.createElement('script'); siteSpect.type = 'text/javascript'; siteSpect.src = '/__ssobj/core.js+ssdomvar.js+generic-adapter.js';siteSpect.async = true; siteSpect.id = 'siteSpectLibraries'; head.appendChild(siteSpect); } if (window.addEventListener){ siteSpect.addEventListener('load', callback, false); } else { siteSpect.attachEvent('onload', callback, false); } } } };})(); </script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script> --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.33.0/js/dropin.js"></script>
=======
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/services/services-web.min.js'></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.12//SearchBox-web.js'></script>

    {{-- assets --}}
    {{-- <script type='text/javascript' src="{{ asset('js/search-markers/search-marker.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/search/search-results-parser.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/search-markers/search-markers-manager.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/info-hint.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/mobile-or-tablet.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/search/results-manager.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/search/side-panel.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/search/dom-helpers.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/formatters.js') }}"></script> --}}
>>>>>>> fa24b6682b34fed45499c80229b27fe84b7e0e9b

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- stile mappa --}}
    {{-- <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/<version>/maps/maps.css'/> --}}
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps.css'>
    {{-- <link href="{{ asset('css/ui-library/index.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/ui-library/icons-css/poi.css') }}" rel="stylesheet" type="text/css"> --}}

    {{-- search tomtom --}}
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.12//SearchBox.css'/>
</head>
<body>
    <div id="app">
        <header class="header">
            <nav class="navbar navbar-expand-md navbar-light">
                {{-- bg-white shadow-sm --}}
                <div class="container-fluid my-container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{-- {{ config('app.name', 'Laravel') }} --}}
                        BoolBnB
                    </a>

                    {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button> --}}

                    <div id="navbarSupportedContent">
                        {{-- class="collapse navbar-collapse" --}}
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav m-auto ">
                            {{-- <li>
                                <a href="#">
                                    prova
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    prova
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    prova
                                </a>
                            </li> --}}
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto flex-grow-0">
                            @guest
                                {{-- menu utente non loggato --}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <button type="button" class="btn btn-menu">
                                            {{-- <div class="icon-one">
                                                <div class="hamburger hamburger-one"></div>
                                            </div> --}}
                                            <div class="burger-icon">
                                                <i class="fas fa-bars"></i>
                                            </div>
                                            <div class="circle">

                                            </div>

                                        </button>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('login') }}">
                                                {{ __('Login') }}
                                            </a>

                                            <a class="dropdown-item" href="{{ route('register') }}">
                                                {{ __('Register') }}
                                            </a>
                                    </div>
                                </li>

                                @if (Route::has('register'))
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('register') }}">
                                                {{ __('Register') }}
                                            </a>
                                        </div>
                                @endif
                                @else
                                {{-- menu utete loggato --}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{-- {{ Auth::user()->name }} --}}
                                        <button type="button" class="btn btn-menu">
                                            {{-- <div class="icon-one">
                                                <div class="hamburger hamburger-one"></div>
                                            </div> --}}
                                            <div class="burger-icon">
                                                <i class="fas fa-bars"></i>
                                            </div>
                                            <div class="circle">
                                                {{ strtoupper(Auth::user()->name[0]) }}
                                            </div>
                                        </button>

                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        {{-- link menu utente loggato --}}
                                        <a class="dropdown-item " href="{{ route('host.locations.index') }}">
                                            <i class="fas fa-house-user dropdown-icon"></i>Le mie location
                                        </a>
                                        {{-- link menu utente loggato --}}
                                        <a class="dropdown-item " href="{{ route('host.home') }}">
                                            <i class="fas fa-border-all dropdown-icon"></i>Dashboard
                                        </a>
                                        {{-- link menu utente loggato --}}
                                        <a class="dropdown-item " href="{{ route('host.emails') }}">
                                            <i class="fas fa-envelope dropdown-icon"></i>Messaggi
                                        </a>
                                        {{-- link menu utente loggato --}}
                                        <a class="dropdown-item" href="{{ route('host.sponsors') }}">
                                            <i class="fas fa-money-bill-wave dropdown-icon"></i>Sponsor
                                        </a>
                                        {{-- link menu utente loggato --}}
                                        <a class="dropdown-item" href="{{ route('host.statistics') }}">
                                            <i class="fas fa-chart-line dropdown-icon"></i>Statistiche
                                        </a>
                                        {{-- link menu utente loggato --}}
                                        <a class="dropdown-item " href="{{ route('host.locations.create') }}">
                                            <i class="fas fa-plus dropdown-icon"></i>Aggiungi annuncio
                                        </a>


                                        {{-- logout --}}
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                                        >
                                        <i class="fas fa-sign-out-alt dropdown-icon"></i>Esci
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="my-container m-auto">
            {{-- <App></App> --}}
            @yield('content')
        </main>


    </div>
</body>
</html>


