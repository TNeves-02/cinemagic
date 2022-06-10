@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-image:url({{asset('img/filmbg.jpg')}}); background-size: cover; background-repeat: no-repeat;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-8">
                <div class="card bg-white text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-2 mt-md-2 pb-2">
                            <h2 class="fw-bold mb-4 text-uppercase">{{ __('Perfil') }}</h2>
                            <hr>
                            <div class="avatar-area">                        
                                <img class="rounded-circle justify-content-center" style="width: 100px; height:100px" src="{{Auth::user()->foto_url ? asset('storage/fotos/' . Auth::user()->foto_url) : asset('img/default_img.png') }}">
                            </div>
                            <h2>{{Auth::user()->name}}</h2>
                            <h5 class="mt-4"><i class="fa-solid fa-envelope"></i> {{ __('Email') }}</h5>
                            <h4>{{Auth::user()->email}}</h4>

                            @if(Auth::user()->tipo == 'C')
                            <h5 class="mt-4"><i class="fa-solid fa-id-card"></i> {{ __('Nif') }}</h5>
                                @if(Auth::user()->cliente->nif != NULL)         
                                    <h4>{{Auth::user()->cliente->nif}}</h4>
                                @else
                                    <h4>Não inserido</h4>        
                                @endif 

                            <h5 class="mt-4"><i class="fa-solid fa-credit-card"></i> {{ __('Tipo pagamento (Predefenido)') }}</h5>
                                @if(Auth::user()->cliente->tipo_pagamento != NULL)         
                                    <h4>{{Auth::user()->cliente->tipo_pagamento}}</h4>
                                @else
                                    <h4>Não inserido</h4>        
                                @endif 

                            <h5 class="mt-4"><i class="fa-solid fa-barcode"></i> {{ __('Referncia de Pagamento') }}</h5>
                                @if(Auth::user()->cliente->ref_pagamento != NULL)         
                                    <h4>{{Auth::user()->cliente->ref_pagamento}}</h4>
                                @else
                                    <h4>Não inserido</h4>        
                                @endif    
                            @endif
                            
                            <hr>
                            <a href="{{ route('clientes.editar') }}"class="btn btn-outline-dark btn-lg mt-2" role="button" aria-pressed="true"><i class="fa-solid fa-pen"></i> {{ __('Editar') }}</a>
                            <a class="btn btn-outline-dark btn-lg mt-2" href="{{ route('welcome.index') }}"><i class="fa-solid fa-arrow-left"></i>
                                {{ __('Página inicial') }}
                            </a>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection