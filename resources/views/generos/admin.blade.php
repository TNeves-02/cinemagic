@extends('layout_admin')

@section('content')
<div class="row mb-3">
    <div class="col-3">
        @can('create', App\Models\genero::class)
            <a href="{{route('admin.generos.create')}}" class="btn btn-success" role="button" aria-pressed="true"><i class="fa-solid fa-plus"></i> Novo Genero</a>
        @endcan
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>code</th>
            <th>nome</th>
            <th colspan="3" style="text-align:center;">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($generos as $genero)
        <tr>
            <td>{{$genero->code}}</td>
            <td>{{$genero->nome}}</td>
            @can('update', $genero)
                <td>
                    <a href="{{route('admin.generos.edit', ['genero' => $genero])}}" class="btn btn-primary btn-sm"
                        role="button" aria-pressed="true"><i class="fa-solid fa-pen"></i></a>
                </td>
            @endcan
            <td>
                <a href="{{route('admin.generos.view', ['genero' => $genero])}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i
                        class="fa-solid fa-eye"></i></a>
            </td>
            @can('delete', $genero)
                <td>
                    <form action="{{route('admin.generos.destroy', ['genero' => $genero])}}"" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </td>
            @endcan
        </tr>
        @endforeach
    </tbody>
</table>

{{ $generos->withQueryString()->links() }}
@endsection