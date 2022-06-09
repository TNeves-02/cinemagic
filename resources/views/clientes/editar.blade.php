@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-image:url({{asset('img/filmbg.jpg')}}); background-size: cover; background-repeat: no-repeat;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-white text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-2 mt-md-2 pb-2">
                            <h2 class="fw-bold mb-4 text-uppercase">{{ __('Editar Perfil') }}</h2>
                            <hr>
                            <div class="avatar-area">
                                <img class="rounded-circle justify-content-center" style="width: 100px; height:100px" src="{{Auth::user()->foto_url ? asset('storage/fotos/' . Auth::user()->foto_url) : asset('img/default_img.png') }}">
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                            <div class="form-outline form-white mb-4 mt-3">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{Auth::user()->name}}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-outline form-white mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{Auth::user()->email}}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button class="btn btn-outline-dark btn-lg px-5 mt-3 me-2" type="submit"><i class="fa-solid fa-pen"></i> {{ __('Confirmar') }}</button>
                            <a href="{{ route('clientes.perfil') }}" class="btn btn-outline-dark btn-lg px-5 mt-3 me-2" role="button" aria-pressed="true"><i class="fa-solid fa-arrow-left"></i> {{ __('Voltar') }}</a>
                            </form>                                                     
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection