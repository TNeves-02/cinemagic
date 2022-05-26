<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-dark">
    <img src="{{url('img/navbar/inicial.svg')}}" id="logo-img-navbar">
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a class="navbar-brand mx-center text-white" id="navbar-center" href="#"> Cinemagic </a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="navbar-brand mx-center text-white" href="#">Filmes</a>
            </li>
            <li class="nav-item">
                <a class="navbar-brand mx-center text-white" href="#">Sessoẽs</a>
            </li>
        </ul>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        @auth
        <div class="avatar-area">
            <span class="name-user">{{Auth::user()->name}}</span>
            <img src="{{Auth::user()->url_foto ? asset('storage/fotos/' . Auth::user()->url_foto) : asset('img/default_img.png') }}">
        </div>
        @else
        <div class="avatar-area">
            <a class="btn btn-light" href="{{ route('login') }}">Login</a>
        </div>
        @endauth
    </div>
    </div>
</nav>