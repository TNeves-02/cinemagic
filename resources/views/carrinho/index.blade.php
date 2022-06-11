@extends('layout')

@section('content')
<br><br><br><br><br>
<hr>
<div>
  {{-- <p>
        <form action="#" method="POST">
            @csrf
            @method("DELETE")
            <input type="submit" value="Apagar carrinho">
        </form>
  </p> --}}
  <p>
        <form action="#" method="POST">
            @csrf
            <input type="submit" value="Confirmar carrinho">
        </form>
  </p>
</div>

<table class="table table-striped table-dark text-light">
    <thead class="text-light">
        <tr>
            <th>Titulo Filme</th>
            <th>Sala</th>
            <th>Sessao</th>
            <th>Hora Inicio</th>
            <th></th>
            <th></th>
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
       
        {{-- <td>
            <form action="#" method="POST">
                @csrf
                @method('put')
                <input type="hidden" name="quantidade" value="1">
                <input type="submit" value="Increment">
            </form>
        </td>
        <td>
            <form action="#" method="POST">
                @csrf
                @method('put')
                <input type="hidden" name="quantidade" value="-1">
                <input type="submit" value="Decrement">
            </form>
        </td>
        <td>
            <form action="#" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="Remove">
            </form>

        </td> --}}
    </tr>
    @endforeach
    </tbody>
</table>

@endsection
