@extends('layout')

@section('content')

<div class="container mt-3">

    <h1>{{$filme->titulo}} - Sessao {{$sessao->id}}</h1>
    <h3>{{$sessao->horario_inicio}}</h3>

    <h5>Numero total de lugares: {{$lugaresTotal}}</h5>
    <table>
    @foreach ($filas as $fila)
            <tr>
            <td>{{$fila->fila}} </td>
            @for ($j = 0; $j < $lugaresFila; $j++)
                <td>
                    <input type="checkbox" name="lugar" id="lugar{{$fila->fila}}{{$j}}">
                </td>
            @endfor
            </tr>
      @endforeach
    </table>
    
</div>

@endsection