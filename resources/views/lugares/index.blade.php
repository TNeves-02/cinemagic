@extends('layout')

@section('content')

<section class="vh-100 mt-5">
    <div class="container py-5 h-100 mt-5 ml-5 pr-5 mw-100">
        <div class="row d-flex justify-content-center align-items-center h-100 w-100">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card bg-white text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-2 mt-md-2 pb-2">
                            <h1>{{$filme->titulo}} - Sessao {{$sessao->id}}</h1>
                            <h4><i class="fa-solid fa-calendar"></i> {{$sessao->data}}&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-clock"></i> {{$sessao->horario_inicio}} </h4>
                            <h5>Numero total de lugares da sala: {{$lugaresTotal}}</h5>
                            <h5>Numero total de lugares por ocupar: {{$lugaresNaoOcupados}}</h5>
                            <hr class="mt-4 mb-4">
                            <form action="{{route('carrinho.store.compra', ['filme' => $filme, 'sessao' => $sessao])}}" method="post">
                                @csrf

                                <table class="table" style="margin: auto; width: 50%">
                                    @foreach ($filas as $fila)
                                    <tr>
                                        @for ($j = 1; $j < $lugaresFila+1; $j++) <td>
                                            @php
                                            $lugarOcupado = false;
                                            @endphp
                                            @foreach ($bilhetes as $bilhete)

                                            @if ($bilhete->lugar->fila == $fila->fila && $bilhete->lugar->posicao == $j)
                                            @php
                                            $lugarOcupado = true;
                                            @endphp
                                            <img src="{{asset('img/Ocupado.png')}}" alt="" style="height: 30px">
                                            @endif
                                            @endforeach
                                            @if (!$lugarOcupado)
                                            <input type="checkbox" name="lugar[]" value="{{$fila->fila}}{{$j}}">
                                            @endif
                                            </td>
                                            @endfor
                                    </tr>
                                    @endforeach
                                </table>
                                <input class="btn btn-dark btn-lg mt-3" type="submit" value="Comprar bilhete(s)">
                            </form>
                            <hr class="mt-4 mb-4">
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