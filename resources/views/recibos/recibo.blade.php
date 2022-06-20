@extends('layout')

@section('content')

<section class="vh-100 mt-5">
    <div class="container py-5 h-100 mt-5 mw-100">
        <div class="row d-flex justify-content-center align-items-center h-100 w-100">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card bg-white text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-2 mt-md-2 pb-2 w-100">
                            <h2 class="fw-bold mb-4 text-uppercase">{{ __('Histórico - Recibo ') }}{{$recibo->id}}</h2>
                            <hr>
                            <table class="table" style="text-align:center">
                                <thead>
                                    <tr>
                                        <th>{{ __('Nº Bilhete') }}</th>
                                        <th>{{ __('Nome do Filme') }}</th>
                                        <th>{{ __('Lugar') }}</th>
                                        <th>{{ __('Estado') }}</th>
                                        <th>{{ __('Preco Sem Iva') }}</th>
                                    </tr>
                                </thead>
                                <tbody>    
                                    @foreach ($bilhetes as $bilhete)
                                    <tr>
                                        <td>{{$bilhete->id}}</td>
                                        <td>{{$bilhete->sessao->filme->titulo}}</td>
                                        <td>{{$bilhete->lugar->fila}}{{$bilhete->lugar->posicao}}</td>
                                        <td>{{$bilhete->estado}}</td>
                                        <td>{{$bilhete->preco_sem_iva}}</td>
                                    </tr>
                                    @endforeach

                                
                                </tbody>
                            </table>                            
                            <hr>
                            <a class="btn btn-outline-dark btn-lg px-5 mt-3 me-2" href="{{ route('welcome.index') }}"><i class="fa-solid fa-arrow-left"></i>
                                {{ __('Página inicial') }}
                            </a>
                            <a class="btn btn-outline-dark btn-lg px-5 mt-3 me-2" href="{{ url()->previous() }}"><i class="fa-solid fa-rotate-left"></i>
                                {{ __('Voltar') }}
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection