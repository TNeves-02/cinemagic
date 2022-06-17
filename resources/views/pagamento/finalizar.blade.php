@extends('layouts.app')

@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-8">
                <div class="card bg-white text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-2 mt-md-2 pb-2">
                            <h2 class="fw-bold mb-4 text-uppercase">{{ __(' Finalizar Pagameto') }}</h2>
                            <hr>
                            <h4>Preço sem Iva : {{$totalPagarSemIva}} €</h4>
                            <h4>Iva : {{$iva}} €</h4>
                            <h4>Total : {{$totalPagarComIva}} €</h4>
                            <hr>
                            <form action="{{ route('pagamento.recibo')  }}">
                            @if ($pagamento == 'VISA')
                            <label for="inputNcartao">Número do Cartão:</label>
                            <input type="text" id="NCartao" name="NCartao" required>
                            <label for="inputcodCVC">Código CVC:</label>
                            <input type="text" id="codCVC" name="codCVC" required>

                            @elseif( $pagamento == 'PAYPAL')
                            <label for="inputEmail">Email</label>
                            <input type="text" id="email" name="email" required>

                             @elseif( $pagamento == 'MBWAY')
                            <label for="inputNTelefone">Nº Telefone</label>
                            <input type="text" id="nTelefone" name="nTelefone" required>

                            @else
                           <h2>Algo Está MAL</h2>
                            @endif
                            @if($errors)
                                <h5 style="color: red">{{$errors->first()}}</h5>
                            @endif
                            <input type="text" id="pagamento" name="pagamento" value="{{$pagamento}}" hidden>
                              <hr>
                            <a class="btn btn-outline-dark btn-lg mt-2" href="{{ route('welcome.index') }}"><i class="fa-solid fa-arrow-left"></i>
                                {{ __('Página inicial') }}
                            </a>
                            <a class="btn btn-outline-dark btn-lg mt-2" href="{{ url()->previous() }}"><i class="fa-solid fa-rotate-left"></i>
                                {{ __('Voltar') }}
                            </a>

                            @if ($pagamento!= '')
                            <button class="btn btn-outline-dark btn-lg mt-2" type="submit">
                            <a>
                                {{ __('Confirmar ') }}<i class="fa-solid fa-arrow-right"></i>
                            </a>
                            </button>
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