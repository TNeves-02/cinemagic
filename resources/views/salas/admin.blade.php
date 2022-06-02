@extends('layout_admin')

@section('content')
<div class="row mb-3">
    <div class="col-3">
        <a href="{{route('admin.salas.create')}}" class="btn btn-success" role="button" aria-pressed="true"><i class="fa-solid fa-plus"></i> Nova Sala</a>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th colspan="3" style="text-align:center;">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($salas as $sala)
        <tr>
            <td>{{$sala->nome}}</td>
            <td>
                <a href="{{route('admin.salas.edit', ['sala' => $sala])}}"
                    class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-pen"></i></a>
             </td>
             <td>
                <a href="{{route('admin.salas.view', ['sala' => $sala])}}"
                    class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-eye"></i></a>
             </td>
                <td>
                <form action="{{route('admin.salas.destroy', ['sala' => $sala])}}"" method="POST">
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
    
{{ $salas->withQueryString()->links() }}
@endsection