@extends('layouts.app')

@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-8">
                <div class="card bg-white text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-2 mt-md-2 pb-2">
                            <h2 class="fw-bold mb-4 text-uppercase">{{ __('Pagameto') }}</h2>
                            <hr>
                            @foreach ($carrinho as $row)
                                
                            
                            <h5 class="mt-4"> {{ __('Filme') }}</h5>
                            <h4>{{$row['titulo_filme']}}</h4>

                            <h5 class="mt-4">{{ __('Sessões') }}</h5>
                             <h4>Sessão {{$row['id']}}</h4>

                             <h5 class="mt-4">{{ __('Sala') }}</h5>
                             <h4>{{$row['sala']}}</h4>

                             <h5 class="mt-4">{{ __('Lugares') }}</h5>
                             <h4>
                             @foreach ($row['lugares'] as $lugar)
                           
                             {{ $lugar }} 
                             @endforeach
                            </h4>
                            <hr>
                            @endforeach
                            <form action="{{route('pagamento.finalizar')}}">
                            <h4>Selecione o método de pagamento</h4>
                            <select class="form-select" aria-label="Metodos de pagamento" id="metodoPagamento" name="pagamento">
                                <option value="VISA">VISA</option>
                                <option value="PAYPAL">PAYPAL</option>
                                <option value="MBWAY">MBWAY</option>
                              </select>

                            <br>
                            <h4>Preço sem Iva : {{$totalPagarSemIva}} €</h4>
                            <h4>Iva : {{$iva}} €</h4>
                            <h4>Total : {{$totalPagarComIva}} €</h4>

                              <br>
                              <hr>
                            <a class="btn btn-outline-dark btn-lg mt-2" href="{{ route('welcome.index') }}"><i class="fa-solid fa-arrow-left"></i>
                                {{ __('Página inicial') }}
                            </a>
                            
                           <button type="submit">
                           <a class="btn btn-outline-dark btn-lg mt-2" >
                                {{ __('Finalizar Compra ') }}<i class="fa-solid fa-arrow-right"></i>
                            </a>
                          </button>
                            
                        </form>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection