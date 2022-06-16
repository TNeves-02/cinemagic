@extends('layout_admin')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <form method="GET" action="#" class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" name="nome" id="inputNome">
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
            <th></th>
            <th>Nome</th>
            <th>NIF</th>
            <th>Email</th>
            <th>Tipo Pagamento</th>
            <th>Ref_pagamento</th>
            @if(Auth::user()->tipo=="A")
                <th colspan="3" style="text-align:center;">Ações</th>
            @endif
        </tr>
    </thead>
    <tbody>
    @foreach ($clientes as $cliente)
        <tr>
            <td>
                <img src="{{$cliente->user->foto_url ? asset('storage/fotos/' . $cliente->user->foto_url) : asset('img/default_img.png') }}" alt="Foto do cliente"  class="img-profile rounded-circle" style="width:40px;height:40px">
            </td>
            <td>{{$cliente->user->name}}</td>
            <td>{{$cliente->nif}}</td>
            <td>{{$cliente->user->email}}</td>
            <td>{{$cliente->tipo_pagamento}}</td>
            <td>{{$cliente->ref_pagamento}}</td>
            @can('blockUnblock', $cliente)   
                <td>
                    <form action="#" method="POST">
                        @csrf
                        @method("UPDATE")     
                            @if($cliente->bloqueado == 1)
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-ban"></i>
                                </button>
                            @else
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa-solid fa-ban"></i>
                                </button>
                            @endif
                    </form>
                </td>
            @endcan
            @can('delete', $cliente)   
                <td>
                    <form action="#" method="POST">
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
    
{{ $clientes->withQueryString()->links() }}
@endsection