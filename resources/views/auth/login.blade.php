@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-image:url({{'img/filmbg.jpg'}}); background-size: cover; background-repeat: no-repeat;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-white text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-2 pb-2">
                            <h2 class="fw-bold mb-4 text-uppercase">{{ __('Login') }}</h2>
                            <hr>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-outline form-white mb-4">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('Remember Me') }}
                                </div>

                                <button class="btn btn-outline-dark btn-lg px-5 mt-5" type="submit">Login</button>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link-dark mt-5" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection