@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-image:url({{asset('img/filmbg.jpg')}}); background-size: cover; background-repeat: no-repeat;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-white text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="md-5 mt-md-2 pb-2">
                            <h2 class="fw-bold mb-4 text-uppercase">{{ __('Reset Password') }}</h2>
                            <hr>
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <button class="btn btn-outline-dark btn-lg px-5 mt-2" type="submit"><i class="fa-solid fa-inbox"></i> {{ __('Send Password Reset Link') }}</button>
                                                            
                                <a class="btn btn-outline-dark btn-lg px-5 mt-3" href="{{ url()->previous() }}"><i class="fa-solid fa-rotate-left"></i>
                                {{ __('Voltar') }}
                            </a> 
                            <hr> 
                            <a class="btn btn-link-dark mt-2" href="{{ route('welcome.index') }}">
                                    {{ __('Voltar à página inicial') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection