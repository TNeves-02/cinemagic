<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('css/all.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/estilos-admin.css') }}" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
                <div class="sidebar-brand-icon">
                    <img src="/img/navbar/inicial.svg" alt="Logo" class="logo-img">
                </div>
                <div class="sidebar-brand-text mx-3"> {{ __('Cinemagic  ') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            @if(Auth::user()->tipo=="A")
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span> {{ __('Dashboard  ') }}</span>
                    </a>
                </li>
        
                <!-- Divider -->
                <hr class="sidebar-divider">
            @endif
            <!-- Nav Item -->
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.clientes')}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>{{ __('Clientes  ') }}</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.filmes')}}">
                    <i class="fas fa-fw fa-film"></i>
                    <span>{{ __('Filmes  ') }}</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.generos')}}">
                    <i class="fas fa-fw fa-clapperboard"></i>
                    <span>{{ __('Generos  ') }}</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.bilhetes')}}">
                    <i class="fas fa-fw fa-ticket"></i>
                    <span>{{ __('Bilhetes  ') }}</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.salas')}}">
                    <i class="fas fa-fw fa-house-chimney"></i>
                    <span>{{ __('Salas  ') }}</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.sessoes')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>{{ __('Sessoes  ') }}</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Parte Publica</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow justify-content-end">

                    <!-- Sidebar Toggle (Topbar) -->
                    <div class="dropdown">
                        @auth
                        <button class="dropbtn justify-content-end">
                            <div class="avatar-area ms-3 text-dark"">
                                <span class="name-user">{{Auth::user()->name}}</span>
                                <img class="rounded-circle ms-3" style="width: 50px; height:50px" src="{{Auth::user()->foto_url ? asset('storage/fotos/' . Auth::user()->foto_url) : asset('img/default_img.png') }}">
                            </div>
                        </button>
                        <div class="dropdown-content">
                            @if(Auth::user()->tipo!="F")
                                <a class="btn" href="{{ route('clientes.perfil') }}">
                                    {{ __('Perfil  ') }}<i class="fa-solid fa-user" id="carbtn-ico ms-3"></i>
                                </a>
                            @endif
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


            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                @if (session('alert-msg'))
                @include('partials.message')
                @endif
                @if ($errors->any())
                @include('partials.errors-message')
                @endif

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="col">
                        @yield('content')
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">

                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0);"> Aplicações para Internet - Cinemagic | © 2022 Copyright

                </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
                    <a class="btn btn-primary" href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

</body>

</html>