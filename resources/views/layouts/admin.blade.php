<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vision.</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js" integrity="sha384-lZmvU/TzxoIQIOD9yQDEpvxp6wEU32Fy0ckUgOH4EIlMOCdR823rg4+3gWRwnX1M" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:100,300,400|Slabo+27px" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>


<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel " style="background-color: #211a1e;">
        <div class="container">
            <a  class="" style="font-family: 'Slabo 27px', serif; font-size: 30px; color: #ffffff;" >VISION.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="background-color: #ffffff;border-radius: 15px;"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                {{--<a  class="" style="font-family: 'Slabo 27px', serif; font-size: 30px; color: #ffffff;" >VISION.</a>--}}
                <ul class="navbar-nav mr-auto">
                    <li><a class="nav-link" href="/Leads"  style="color: #ffffff;">Leads</a></li>
                    <li><a class="nav-link" href="/Agentes"  style="color: #ffffff;">Agentes</a></li>
                    <li><a class="nav-link" href="/Dialer" style="color: #ffffff;">Dialer</a></li>
                    <li><a class="nav-link" href="/Admin" style="color: #ffffff;">Admin</a></li>
                    <li><a class="nav-link" href="/Do_Request" style="color: #ffffff;">Do request</a></li>
                    <li><a class="nav-link" href="/Ajustes" style="color: #ffffff;">Ajustes</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}" style="color: #ffffff;">Iniciar Sesion  </a></li>
                        {{-- <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li> --}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: #ffffff" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span><img style="height: 50px;border-radius: 50px;" src="{{ Auth::user()->avatar }}"/>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    {{ __('Dashboard') }}
                                </a>

                                <a class="dropdown-item" href="/Agentes/Ver/{{ Auth::user()->user }}">
                                    {{ __('Perfil') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>

        </div>
    </nav>


    @yield('content')


</div>
<div style="background-color: #211A1E;height: 10vh;">
    <div class="container">
        <div class="row">
            <div class="col-12" style="color: #ffffff;text-align: left;padding-top: 50px;"><a>Todos los derechos son reservados a Vision callcenter.</a></div>
        </div>
    </div>
</div>
</body>
</html>
