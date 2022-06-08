<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        
        <a class="btn btn btn-outline-bg" id="carbtn" href="#"><i class="bi bi-cart" id="carbtn-ico ms-3"></i>  Carrinho</a>
            @auth
            <!-- Nav Item - User Information -->
            <div class="avatar-area ms-3 nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="name-user">{{Auth::user()->name}}</span>
                    <img class="rounded-circle ms-3" style="width: 50px; height:50px" src="{{Auth::user()->foto_url ? asset('storage/fotos/' . Auth::user()->foto_url) : asset('img/default_img.png') }}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Perfil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </div>

            @else
            <div class="avatar-area ms-3">
                
                <a class="btn btn-light" href="{{ route('login') }}">Login</a>
            </div>
            @endauth
        </div>
        </div>
    </nav>

    @yield('content')
    <!--container-->

    <br><br><br>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary"  href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center text-white">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0);"> Aplicações para Internet - Cinemagic | © 2022 Copyright
    </footer>

    <!-- Bootstrap core JavaScript
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>-->

</body>
</html>
