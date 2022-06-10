@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-image:url({{asset('img/filmbg.jpg')}}); background-size: cover; background-repeat: no-repeat;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-white text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-2 pb-2">
                            <h2 class="fw-bold mb-4 text-uppercase">{{ __('Registar') }}</h2>
                            <hr>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-outline form-white mb-4">
                                    <input id="name" type="text" placeholder="{{ __('Nome') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input id="email" type="email" placeholder="{{ __('Email Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input id="password-confirm" type="password" class="form-control" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <hr>
                                <button class="btn btn-outline-dark btn-lg px-5 mt-3 me-2" type="submit"><i class="fa-solid fa-circle-check"></i> {{ __('Registar') }}</button>
                                <a href="{{ route('login') }}" class="btn btn-outline-dark btn-lg px-5 mt-3 ms-2"><i class="fa-solid fa-arrow-left"></i> {{ __('Voltar') }}</a>                                
                            </form>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</section>
@endsection