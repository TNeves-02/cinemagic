@extends('layout_admin')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <form method="GET" action="{{route('admin.bilhetes')}}" class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" name="nome" id="inputNome" value="{{$nome}}"placeholder="Nome do Cliente">
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
            <th>Recibo ID</th>
            <th>Cliente</th>
            <th>Sessao</th>
            <th>Sala</th>
            <th>Lugar</th>
            <th>Data compra</th>
            <th>Preço s/iva</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($bilhetes as $bilhete)
        <tr>
            <td>{{$bilhete->recibo_id}}</td>
            <td>{{$bilhete->cliente->user->name}}</td>
            <td>{{$bilhete->sessao_id}}</td>
            <td>{{$bilhete->sessao->sala->nome}}</td>
            <td>{{$bilhete->lugar->fila}}{{$bilhete->lugar->posicao}}</td>
            <td>{{$bilhete->recibo->data}}</td>
            <td>{{$bilhete->preco_sem_iva}}</td>
            <td>

            @if ($bilhete->estado == "usado")
            <span class="badge badge-success">{{$bilhete->estado}}</span>
            @elseif($bilhete->estado == "não usado")
            <span class="badge badge-danger">{{$bilhete->estado}}</span>
            @endif
        </td>
            {{-- @can('update', $bilhete)
                <td>
                <a href="#"
                    class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-pen"></i></a>
                </td>
            @endcan
            <td>
               <a href="#"
                   class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-eye"></i></a>
            </td>
            --}}
        </tr>
    @endforeach
    </tbody>
</table>
    
{{ $bilhetes->withQueryString()->links() }}
@endsection