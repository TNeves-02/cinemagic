@extends('layout_admin')

@section('content')
<div class="row mb-3">
    <div class="col-3">
        <a href="{{route('admin.lugares.create')}}" class="btn btn-success" role="button" aria-pressed="true"><i class="fa-solid fa-plus"></i> Novos Lugares</a>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Sala</th>
            <th>Fila</th>
            <th>Posição</th>
            <th colspan="3" style="text-align:center;">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($lugares as $lugar)
        <tr>
            <td>{{$lugar->sala->nome}}</td>
            <td>{{$lugar->fila}}</td>
            <td>{{$lugar->posicao}}</td>
             <td>
                <a href="#"
                    class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-eye"></i></a>
             </td>
                <td>
                <form action="#"" method="POST">
                    @csrf
                    @method("DELETE")        
                    <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
{{ $lugares->withQueryString()->links() }}
@endsection