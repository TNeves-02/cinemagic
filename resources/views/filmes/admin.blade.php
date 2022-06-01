@extends('layout_admin')

@section('content')
<div class="row mb-3">
    <div class="col-3">
        <a href="{{route('admin.filmes.create')}}" class="btn btn-success" role="button" aria-pressed="true">Novo Filme</a>
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
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($filmes as $filme)
        <tr>
            <td>{{$filme->titulo}}</td>
            <td>{{$filme->genero->nome}}</td>
            <td>{{$filme->ano}}</td>
            <td>
                <a href="{{route('admin.filmes.edit', ['filme' => $filme])}}"
                    class="btn btn-primary btn-sm" role="button" aria-pressed="true">Alterar</a>
             </td>
             <td>
                <a href="{{route('admin.filmes.view', ['filme' => $filme])}}"
                    class="btn btn-warning btn-sm" role="button" aria-pressed="true">Visualizar</a>
             </td>
                <td>
                    <form action="{{route('admin.filmes.destroy', ['filme' => $filme])}}"" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="submit" class="btn btn-danger btn-sm" value="Apagar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
            {{ $filmes->withQueryString()->links() }}
    @endsection
