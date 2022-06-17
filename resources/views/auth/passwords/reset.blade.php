@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-image:url({{asset('img/filmbg.jpg')}}); background-size: cover; background-repeat: no-repeat;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-white text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-2 mt-md-2 pb-2">
                            <h2 class="fw-bold mb-4 text-uppercase">{{ __('Reset Password') }}</h2>
                            <hr>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-outline form-white mb-4">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email Adress') }}"  name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('New Password') }}" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">                                    
                                </div>
                                
                                <hr>    
                                <button class="btn btn-outline-dark btn-lg px-5 mt-3 me-2" type="submit"><i class="fa-solid fa-lock"></i> {{ __('Reset Password') }}</button>
                            </form>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection