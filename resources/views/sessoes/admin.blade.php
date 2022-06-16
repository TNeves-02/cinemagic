@extends('layout_admin')

@section('content')
<div class="row mb-3">
    <div class="col-3">
        @can('create', App\Models\sessao::class)
            <a href="{{route('admin.sessoes.create')}}" class="btn btn-success" role="button" aria-pressed="true"><i class="fa-solid fa-plus"></i> Nova Sessao</a>
        @endcan
    </div>
    <div class="col-9">
        <form method="GET" action="{{route('admin.sessoes')}}" class="form-group">
            <div class="input-group">
                <select class="custom-select" name="filme" id="inputFilme" aria-label="Filme">
                    <option value="" {{'' == old('filme', $selectedFilme) ? 'selected' : ''}}>Todos Filmes</option>
                    @foreach ($filmes as $filme)
                    <option value={{$filme->id}} {{$filme->id == old('filme', $selectedFilme) ? 'selected' : ''}}>{{$filme -> titulo}}</option>
                    @endforeach

                </select>
                <select class="custom-select" name="sala" id="inputFilme" aria-label="Filme">
                    <option value="" {{'' == old('sala', $selectedSala) ? 'selected' : ''}}>Todas Salas</option>
                    @foreach ($salas as $sala)
                    <option value={{$sala->id}} {{$sala->id == old('sala', $selectedSala) ? 'selected' : ''}}>{{$sala -> nome}}</option>
                    @endforeach

                </select>
                <input type="date" class="form-control" name="data" id="inputData" value="{{$selectedData}}"  />
                <input type="time" class="form-control" name="horario_inicio" id="inputHora" value="{{$selectedHora}}"  />
                
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
            <th>Filme</th>
            <th>Sala</th>
            <th>Data</th>
            <th>Hora-inicio</th>
            <th colspan="3" style="text-align:center;">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($sessoes as $sessao)
        <tr>
            <td>{{$sessao->filme->titulo}}</td>
            <td>{{$sessao->sala->nome}}</td>
            <td>{{$sessao->data}}</td>
            <td>{{$sessao->horario_inicio}}</td>
            @can('update', $sessao)
                <td>
                    <a href="{{route('admin.sessoes.edit', ['sessao' => $sessao])}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-pen"></i></a>
                </td>
            @endcan
            <td>
               <a href="{{route('admin.sessoes.view', ['sessao' => $sessao])}}"
                    class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-eye"></i></a>
            </td>
            @can('delete', $sessao)
                <td>
                    <form action="{{route('admin.sessoes.destroy', ['sessao' => $sessao])}}"" method="POST">
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
    
{{ $sessoes->withQueryString()->links() }}
@endsection