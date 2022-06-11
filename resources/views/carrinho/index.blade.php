@extends('layout')

@section('content')
<br><br><br><br><br>
<hr>


<table class="table table-striped table-dark text-light">
    <thead class="text-light">
        <tr>
            <th>Titulo Filme</th>
            <th>Sala</th>
            <th>Sessao</th>
            <th>Hora Inicio</th>
            <th>Lugares Escolhidos</th>
            <th></th>
           
        </tr>
    </thead>
    <tbody>
    @foreach ($carrinho as $row)
    <tr>
        <td>{{ $row['titulo_filme'] }} </td>
        <td>{{ $row['sala'] }} </td>
        <td>{{ $row['sessao_id'] }} </td>
        <td>{{ $row['horario_sessao'] }} </td>
        <td>
            @foreach ($row['lugares'] as $lugar)
            {{ $lugar }} 
            @endforeach
        </td>
       
       
       
        <td>
            <form action="{{route('carrinho.destroy_linha', $row['id'])}}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="Remove">
            </form>

        </td>
    </tr>
    @endforeach
    </tbody>
</table>

<div>
    <p>
          <form action="{{route('carrinho.destroy')}}" method="POST">
              @csrf
              @method("DELETE")
              <input type="submit" value="Apagar carrinho">
          </form>
    </p>
    <p>
          <form action="{{route('carrinho.store.carrinho')}}" method="POST">
              @csrf
              <input type="submit" value="Confirmar carrinho">
          </form>
    </p>
  </div>

@endsection
