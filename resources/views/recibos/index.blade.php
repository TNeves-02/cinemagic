@extends('layout')

@section('content')

<section class="vh-100 mt-5 mb-5">
    <div class="container py-5 h-100 mt-5 mw-100">
        <div class="row d-flex justify-content-center align-items-center h-100 w-100">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 ">
                <div class="card bg-white text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-2 mt-md-2 pb-2 w-100">
                            <h2 class="fw-bold mb-4 text-uppercase">{{ __('Histórico') }}</h2>
                            <hr>
                            <table class="table" style="text-align:center; margin: auto; width: 80%">
                                <thead>
                                    <tr>
                                        <th>{{ __('Nº Recibo') }}</th>
                                        <th>{{ __('Data') }}</th>                                    
                                        <th>{{ __('Preço') }}</th>
                                        <th>{{ __('Ações') }}</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    @foreach ($recibos as $recibo)
                                    <tr>
                                        <td>{{$recibo->id}}</td>
                                        <td>{{$recibo->data}}</td>
                                        <td>{{$recibo->preco_total_com_iva}}</td>                                    
                                        <td>
                                            <a href="{{route('historico.recibo', ['recibo' => $recibo])}}" class="btn btn-dark" role="button" aria-pressed="true"><i class="fa-solid fa-eye"></i> Mais Informação</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="paginacao d-flex justify-content-center">
                                {{ $recibos->withQueryString()->links() }}
                            </div>
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