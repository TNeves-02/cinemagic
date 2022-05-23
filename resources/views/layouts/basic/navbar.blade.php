<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-dark">
    <img src="{{url('img/navbar/inicial.svg')}}" id="logo-img-navbar">
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a class="navbar-brand mx-center text-white" id="navbar-center" href="#"> Cinemagic </a>
    
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
</nav>

