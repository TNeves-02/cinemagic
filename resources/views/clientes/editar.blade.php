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
                                <img class="rounded-circle justify-content-center" style="width: 70px; height:70px" src="{{Auth::user()->foto_url ? asset('storage/fotos/' . Auth::user()->foto_url) : asset('img/default_img.png') }}">
                            </div>
                               
                            <form method="POST" action="{{route('clientes.update',  Auth::user())}}" class="form-group">
                                @csrf
                                @method('PUT')
                            <div class="form-outline form-white mb-4 mt-3">
                                <h6 style=" text-align: initial;">Nome:</h6>
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name}}" required autocomplete="name" autofocus>
                         
                            </div>
                            <div class="form-outline form-white mb-4">
                                <h6 style=" text-align: initial;">Email:</h6>
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email}}" required autocomplete="email" autofocus>
                          
                            </div>
                            @if(Auth::user()->tipo == 'C')
                            <div class="form-outline form-white mb-4 mt-3">
                                <h6 style=" text-align: initial;">Nif:</h6>
                                <input id="nif" type="text" class="form-control"  name="nif" value="{{Auth::user()->cliente->nif}}"  autocomplete="nif" autofocus>

                            </div>
                            <div class="form-outline form-white mb-4 mt-3">
                                <h6 style=" text-align: initial;">Tipo de pagamento:</h6>
                                <select class="form-control" name="tipo_pagamento"  id="tipo_pagamento">
                                    <option value="" @if(Auth::user()->cliente->tipo_pagamento != NULL) selected @endif>Não Inserido</option>
                                    <option value="ViSA" @if(Auth::user()->cliente->tipo_pagamento == "VISA") selected @endif>ViSA</option>
                                    <option value="PAYPAL" @if(Auth::user()->cliente->tipo_pagamento == "PAYPAL") selected @endif>PAYPAL</option>
                                    <option value="MBWAY" @if(Auth::user()->cliente->tipo_pagamento == "MBWAY") selected @endif>MBWAY</option>
                                </select>
                            </div>
                            <div class="form-outline form-white mb-4 mt-3">
                            <h6 style=" text-align: initial;">Ref. Pagamento:</h6>
                            <input type="text"class="form-control"  name="ref_pagamento" value="{{Auth::user()->cliente->ref_pagamento}}" autocomplete="nif" autofocus >
                             </div>
                            @endif
                            <hr>
                            <button class="btn btn-outline-dark btn-lg px-5 mt-2 me-2" type="submit"><i class="fa-solid fa-pen"></i> {{ __('Confirmar') }}</button>                        
                           
                            <a class="btn btn-outline-dark btn-lg px-5 mt-2 me-2" href="{{ url()->previous() }}"><i class="fa-solid fa-rotate-left"></i>
                                {{ __('Voltar') }}
                            </a>      
                            <a class="btn btn-outline-dark btn-lg px-5 mt-2 me-2" href="{{route('welcome.index') }}"><i class="fa-solid fa-arrow-left-long"></i>
                                {{ __('Pagina Inicial') }}
                            </a>                        
                            <a class="btn btn-outline-dark btn-lg px-5 mt-4 me-2" href="{{ route('password.request') }}"><i class="fa-solid fa-key"></i>
                                {{ __('Editar Password') }}
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