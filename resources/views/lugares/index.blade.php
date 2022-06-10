@extends('layout')

@section('content')

<div class="container mt-3">

    <h1>{{$filme->titulo}} - Sessao {{$sessao->id}}</h1>
    <h3>{{$sessao->horario_inicio}}</h3>

    <h5>Numero total de lugares: {{$lugaresTotal}}</h5>
    <h5>Lugares Ocupados: {{$lugaresTotal}}</h5>

    @foreach ($lugaresOcp as $lugar)
        <h5>{{$lugar->fila}} - {{$lugar->posicao}}</h5>
    @endforeach
    <h1>{{$lugaresOcp}}</h1>
    <table>
    @foreach ($filas as $fila)
            <tr>
            @for ($j = 1; $j < $lugaresFila+1; $j++)
                <td>
                    @foreach ($lugaresOcp as $lugar)
                          @if ($fila->fila== $lugar->fila && $j== $lugar->posicao)
                             <img src="{{asset('img/Escolhido.png')}}"  alt="" style="height: 30px">
                          @else
                          <input type="checkbox" name="lugar" id="lugar{{$fila->fila}}{{$j}}">
                          @endif
                     @endforeach
                     
                     <input type="checkbox" name="lugar" id="lugar{{$fila->fila}}{{$j}}">
                   
                </td>
            @endfor
            </tr>
      @endforeach
    </table>
    
</div>

@endsection