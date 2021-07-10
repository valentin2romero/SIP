</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('NOMBRE_SITIO','SIP')}}</title>

    <!-- Icono -->
    <link rel="icon" href="{{asset('favicon.ico')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery..min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('fonts/font-poppins.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customize_style.css') }}" rel="stylesheet">

    @livewireStyles

</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        @auth
        <!--
        <nav id="sidebar" class="active">
        -->
        <nav id="sidebar" class="">
            <h1><a href="{{ route('home') }}" class="logo">{{env('SIGLA','SIP')}}</a></h1>
            <ul class="list-unstyled components mb-5">
                <li>
                    <a href="{{ route('home') }}"><span class="fa fa-home"></span>Inicio</a>
                </li>
                <li>
                    <a href="{{ route('sentencia.create') }}"><span class="fa fa-sticky-note"></span>Nueva Sentencia</a>
                </li>
                <li>
                    <a href="{{ route('sentencia.index') }}"><span class="fa fa-history"></span>Historial</a>
                </li>
                <li>
                    <a href="{{ route('home.herramienta') }}"><span class="fa fa-cog"></span>Herramientas</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span class="fas fa-sign-out-alt"></span>{{ __('Salir') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        @endauth

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    @auth
                    <button type="button" id="sidebarCollapse" class="btn btn-navedit">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    @endauth

                    <ul class="nav navbar-nav">
                        <a class="left">
                            <a class="nav-link" href="{{ url('/') }}">
                                @guest
                                <img src="{{asset('img/escudo-argentina.png')}}" class="rounded float-start" style="max-width: 50px; max-height: 50px; padding-bottom: 8px;" alt="Escudo Argentina">
                                @endguest
                                {{env('TITULO','SIP')}}
                            </a>
                        </a>
                    </ul>
                    <ul class="nav navbar-nav ml-auto">
                        <a class="right-1">
                            {{env('SIGLA','SIP')}}
                        </a>
                        <a class="right-2">
                            - {{env('NOMBRE','Sistema Inteligente Previsional')}}
                        </a>

                    </ul>
                </div>
            </nav>
            <!-- CUERPO -->
            @yield('content')
        </div>
    </div>

    @livewireScripts

</body>

</html>