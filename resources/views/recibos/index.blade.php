@extends('layout')

@section('content')

<section class="vh-100 mt-5">
    <div class="container py-5 h-100 mt-5 mw-100">
        <div class="row d-flex justify-content-center align-items-center h-100 w-100">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card bg-white text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-2 mt-md-2 pb-2 w-100">
                            <h2 class="fw-bold mb-4 text-uppercase">{{ __('Histórico') }}</h2>
                            <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Nº Recibo') }}</th>
                                        <th>{{ __('Filme') }}</th>
                                        <th>{{ __('Data') }}</th>
                                        <th>{{ __('Nº Bilhetes') }}</th>
                                        <th>{{ __('Lugares') }}</th>
                                        <th>{{ __('Preço') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recibos as $recibo)
                                    <tr>
                                        <td>{{$recibo->bilhete[0]->id}}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <hr>
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