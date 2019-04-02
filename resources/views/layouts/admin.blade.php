<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vision.</title>

    @if( empty($needtel))

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300' rel='stylesheet' type='text/css'>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:100,300,400|Slabo+27px" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix("css/app.css") }}">
        @else
        <script src="//cdn.sinch.com/latest/sinch.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/PSTNsample.js') }}" defer></script>

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300' rel='stylesheet' type='text/css'>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:100,300,400|Slabo+27px" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ mix("css/app.css") }}">
        @endif


</head>
<body>


<div id="principal" >
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel " style="background-color: #211a1e;">
        <div class="container">
            <a  class="" style="font-family: 'Slabo 27px', serif; font-size: 30px; color: #ffffff;" >VISION.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="background-color: #ffffff;border-radius: 15px;"></span>
                {{--@if(Auth::user()->notifications->where('estado', 'activo')->count())--}}

                {{--@endif--}}
            </button>

                @if( Auth::user()->nivel()->first()->id <= 3)

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <ul class="navbar-nav mr-auto">
                                <li class="nav"><a class="nav-link" href="/Leads"  style="color: #ffffff;">Leads</a></li>
                                <li class="nav"><a class="nav-link" href="/Telefono"  style="color: #ffffff;">Telefono</a></li>
                                <li class="nav"><a class="nav-link" href="/Dialer" style="color: #ffffff;">Dialer</a></li>
                            </ul>
                            @else
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <li class="nav"><a class="nav-link" href="/Leads"  style="color: #ffffff;">Leads</a></li>
                                        <li class="nav"><a class="nav-link" href="/Prefijos" style="color: #ffffff;">Prefijos</a></li>
                                        <li class="nav"><a class="nav-link" href="/Agentes"  style="color: #ffffff;">Agentes</a></li>
                                        <li class="nav"><a class="nav-link" href="/Telefono"  style="color: #ffffff;">Telefono</a></li>
                                        <li class="nav"><a class="nav-link" href="/Dialer" style="color: #ffffff;">Dialer</a></li>
                                        <li class="nav"><a class="nav-link" href="/Admin" style="color: #ffffff;">Admin</a></li>
                                        <li class="nav"><a class="nav-link" href="/Do_Request" style="color: #ffffff;">Do request</a></li>
                                        <li class="nav"><a class="nav-link" href="/Ajustes" style="color: #ffffff;">Ajustes</a></li>
                                    </ul>
                                @endif



                <ul class="navbar-nav ml-auto">

                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}" style="color: #ffffff;">Iniciar Sesion  </a></li>

                    @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: #ffffff" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>

                              


                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('home') }}">
                                    {{ __('Dashboard') }}
                                </a>

                                <a class="dropdown-item" href="Notifications">
                                    {{ __('Centro de notificaciones') }}
                                </a>

                                <a class="dropdown-item" href="/Agentes/Ver/{{ Auth::user()->user }}">
                                    {{ __('Perfil') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>


                            <notifications :user="{{ Auth::user()->id }}"></notifications>


                    @endguest
                </ul>
            </div>

        </div>
                    </div>
        </div>
    </nav>



    @yield('content')


<div style="background-color: #211A1E;height: 10vh;">
    <div class="container">
        <div class="row">
            <div class="col-12" style="color: #ffffff;text-align: left;padding-top: 50px;"><a>Todos los derechos son reservados a Vision callcenter.</a></div>
        </div>
    </div>
</div>

</div>
</body>
<script src="{{ mix("js/app.js") }}"></script>
</html>
