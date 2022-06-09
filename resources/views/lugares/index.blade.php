@extends('layout')

@section('content')

<div class="container mt-3">

    <table>
    @foreach ($filas as $fila)
        
        
            <tr>
            <td>{{$fila->fila}} </td>
            @for ($j = 0; $j < $lugaresFila; $j++)
                <td>
                     
                    <img src="{{asset('img/lugar.png')}}" alt="lugar" style="height: 30px;" id="lugar{{$fila->fila}}{{$j}}" onclick="document.getElementById('lugar{{$fila->fila}}{{$j}}').src = '{{asset('img/Escolhido.png')}}'">
                
                </td>
            @endfor
            </tr>
      @endforeach
    </table>
    
</div>

@endsection