@extends('layout')

@section('content')

<div class="container mt-3">

    <h1>{{$filme->titulo}} - Sessao {{$sessao->id}}</h1>
    <h3>{{$sessao->horario_inicio}}</h3>

    <h5>Numero total de lugares da sala: {{$lugaresTotal}}</h5>
    <h5>Numero total de lugares por ocupar: {{$lugaresNaoOcupados}}</h5>

    <form action="{{route('carrinho.store.compra', ['filme' => $filme, 'sessao' => $sessao])}}" method="post" >
        @csrf

    <table>
      @foreach ($filas as $fila)   
            <tr>
                @for ($j = 1; $j < $lugaresFila+1; $j++)
                <td>
                    @php
                    $lugarOcupado = false;
                  @endphp
                     @foreach ($bilhetes as $bilhete)
                         
                          @if ($bilhete->lugar->fila == $fila->fila && $bilhete->lugar->posicao == $j)
                          @php
                              $lugarOcupado = true;
                          @endphp
                               <img src="{{asset('img/Ocupado.png')}}"  alt="" style="height: 30px">
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
    <input type="submit" value="Comprar bilhete(s)">
</form>

</div>

@endsection