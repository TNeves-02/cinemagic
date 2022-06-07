@extends('layout_admin')

@section('content')
<div class="row mb-3">
    <div class="col-3">
        <a href="{{route('admin.clientes.create')}}" class="btn btn-success" role="button" aria-pressed="true"><i class="fa-solid fa-plus"></i> Novo   !! NÃO SEI SE FAZ SENTIDO</a>
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
            <th colspan="3" style="text-align:center;">Ações</th>
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
            <td>
                <a href="#"
                    class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-pen"></i></a>
             </td>
             <td>
                <a href="#""
                    class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-eye"></i></a>
             </td>
                <td>
                <form action="#" method="POST">
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
    
{{ $clientes->withQueryString()->links() }}
@endsection