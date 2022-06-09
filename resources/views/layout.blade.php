<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ config('app.name')}}
    </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link href="{{asset('css/all.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}"></script>

</head>

<body>


    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-dark">
        <img src="{{url('img/navbar/inicial.svg')}}" id="logo-img-navbar">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a class="navbar-brand mx-center text-white" id="navbar-center" href="{{route('welcome.index')}}"> Cinemagic </a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="navbar-brand mx-center text-white" href="{{route('filmes.index')}}">Filmes</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand mx-center text-white" href="{{route('filmes.index')}}">Sessões</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end mr-5 pr-5">
            <a class="btn btn btn-outline-bg" id="carbtn" href="#"><i class="bi bi-cart" id="carbtn-ico ms-3"></i> Carrinho</a>
            <div class="dropdown">
                @auth
                <button class="dropbtn">
                    <div class="avatar-area ms-3">
                        <span class="name-user">{{Auth::user()->name}}</span>
                        <img class="rounded-circle ms-3" style="width: 50px; height:50px" src="{{Auth::user()->foto_url ? asset('storage/fotos/' . Auth::user()->foto_url) : asset('img/default_img.png') }}">
                    </div>
                </button>
                <div class="dropdown-content">
                    <a class="btn" href="{{ route('clientes.perfil') }}">
                        {{ __('Perfil  ') }}<i class="fa-solid fa-user" id="carbtn-ico ms-3"></i>
                    </a>
                    <a class="btn" href="{{ route('admin.dashboard') }}">
                        {{ __('Dashboard  ') }}<i class="fa-solid fa-chart-line" id="carbtn-ico ms-3"></i>
                    </a>
                    <a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout  ') }}<i class="fa-solid fa-power-off" id="carbtn-ico ms-3"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                @else
                <div class="avatar-area ms-2 mp-5 pr-5">
                    <a class="btn btn-outline-light" href="{{ route('login') }}"><i class="fa-solid fa-user"></i> Login</a>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    @yield('content')
    <!--container-->

    <br><br><br>


    <footer class="text-center text-white">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0);"> Aplicações para Internet - Cinemagic | © 2022 Copyright
    </footer>

</body>

</html>