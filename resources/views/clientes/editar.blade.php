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

                            <form method="POST" action="{{ route('clientes.update', Auth::user() )}}" class="form-group">
                                @csrf
                                @method('PUT')
                            <div class="form-outline form-white mb-4 mt-3">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-outline form-white mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @if(Auth::user()->tipo == 'C')
                            <div class="form-outline form-white mb-4 mt-3">
                                @if(Auth::user()->cliente->nif != NULL) 
                                <input id="nif" type="nif" class="form-control @error('nif') is-invalid @enderror"  name="nif" value="{{Auth::user()->cliente->nif}}" required autocomplete="nif" autofocus>
                                @else
                                <input id="nif" type="nif" class="form-control @error('nif') is-invalid @enderror" placeholder="{{ __('Não Inserido') }}" name="nif" value="{{ old('nif') }}" required autocomplete="nif" autofocus>     
                                @endif

                                @error('nif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-outline form-white mb-4 mt-3">
                                @if(Auth::user()->cliente->tipo_pagamento != NULL) 
                                <input id="tipo_pagamento" type="tipo_pagamento" class="form-control @error('tipo_pagamento') is-invalid @enderror" name="tipo_pagamento" value="{{Auth::user()->cliente->tipo_pagamento}}" required autocomplete="tipo_pagamento" autofocus>
                                @else
                                <input id="tipo_pagamento" type="tipo_pagamento" class="form-control @error('tipo_pagamento') is-invalid @enderror" placeholder="{{ __('Não Inserido') }}" name="tipo_pagamento" value="{{ old('tipo_pagamento') }}" required autocomplete="tipo_pagamento" autofocus>     
                                @endif    

                                @error('tipo_pagamento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-outline form-white mb-4 mt-3">
                                @if(Auth::user()->cliente->ref_pagamento != NULL) 
                                <input id="ref_pagamento" type="ref_pagamento" class="form-control @error('ref_pagamento') is-invalid @enderror" name="ref_pagamento" value="{{Auth::user()->cliente->ref_pagamento}}" required autocomplete="tipo_pagamento" autofocus>
                                @else
                                <input id="ref_pagamento" type="ref_pagamento" class="form-control @error('ref_pagamento') is-invalid @enderror" placeholder="{{ __('Não Inserido') }}" name="ref_pagamento" value="{{ old('ref_pagamento') }}" required autocomplete="tipo_pagamento" autofocus>     
                                @endif
                                
                                @error('ref_pagamento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @endif
                            <button class="btn btn-outline-dark btn-lg px-5 mt-3 me-2" type="submit"><i class="fa-solid fa-pen"></i> {{ __('Confirmar') }}</button>                        
                            <a class="btn btn-outline-dark btn-lg px-5 mt-3 me-2" href="{{ url()->previous() }}"><i class="fa-solid fa-rotate-left"></i>
                                {{ __('Voltar') }}
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