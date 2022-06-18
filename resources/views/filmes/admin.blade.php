@extends('layout_admin')

@section('content')
<div class="row mb-3">
    <div class="col-3">
        @can('create', App\Models\Filme::class)
            <a href="{{route('admin.filmes.create')}}" class="btn btn-success" role="button" aria-pressed="true"><i class="fa-solid fa-plus"></i> Novo Filme</a>
        @endcan
    </div>
    <div class="col-9">
        <form method="GET" action="{{route('admin.filmes')}}" class="form-group">
            <div class="input-group">
                <select class="custom-select" name="genero" id="inputGernero" aria-label="Genero">
                    <option value="" {{'' == old('genero', $selectedGenero) ? 'selected' : ''}}>Todos Generos</option>
                    @foreach ($generos as $genero)
                    <option value={{$genero->code}} {{$genero->code == old('genero', $selectedGenero) ? 'selected' : ''}}>{{$genero -> nome}}</option>
                    @endforeach

                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Filtrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Genero</th>
            <th>Ano</th>
            <th colspan="3" style="text-align:center;">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($filmes as $filme)
        <tr>
            <td>{{$filme->titulo}}</td>
            <td>{{$filme->genero->nome}}</td>
            <td>{{$filme->ano}}</td>
            @can('update', $filme)
                <td>
                <a href="{{route('admin.filmes.edit', ['filme' => $filme])}}"
                    class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-pen"></i></a>
                </td>
            @endcan
            <td>
               <a href="{{route('admin.filmes.view', ['filme' => $filme])}}"
                   class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-eye"></i></a>
            </td>
            @can('delete', $filme)  
                <td>
                    <form action="{{route('admin.filmes.destroy', ['filme' => $filme])}}" method="POST">
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
    
{{ $filmes->withQueryString()->links() }}
@endsection