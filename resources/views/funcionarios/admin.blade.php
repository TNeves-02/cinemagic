@extends('layout_admin')

@section('content')
<div class="row mb-3">
    <div class="col-3">

            <a href="{{route('admin.funcionarios.create')}}" class="btn btn-success" role="button" aria-pressed="true"><i class="fa-solid fa-plus"></i> Novo Funcionario</a>
    </div>
    
</div>
<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Nome</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Estado</th>
            <th colspan="4" style="text-align:center;">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($funcionarios as $funcionario)

    @if ($funcionario->id != Auth::user()->id)
        <tr>
            <td>
                <img src="{{$funcionario->foto_url ? asset('storage/fotos/' . $funcionario->foto_url) : asset('img/default_img.png') }}" alt="Foto do funcionario"  class="img-profile rounded-circle" style="width:40px;height:40px">
            </td>
            <td>{{$funcionario->name}}</td>
            <td>{{$funcionario->email}}</td>
            <td>{{$funcionario->tipo}}</td>
            <td>
                @if ($funcionario->bloqueado == 1)
                <span class="badge badge-danger">Bloqueado</span>
                @elseif($funcionario->bloqueado == 0)
                <span class="badge badge-success">Ativo</span>
                @endif
            </td>   
                <td>
                    <form action="{{route('admin.funcionarios.block', $funcionario)}}" method="POST">
                        @csrf
                        @method('PUT')     
                            @if($funcionario->bloqueado == 1)
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa-solid fa-ban"></i>
                                </button>
                            @else
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-ban"></i>
                                </button>
                            @endif
                    </form>
                </td>
                <td>
                    <form action="{{route('admin.funcionarios.destroy', $funcionario)}}" method="POST">
                        @csrf
                        @method("DELETE")     
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                    </form>
                </td>
                <td>
                <a href="{{route('admin.funcionarios.edit', $funcionario)}}"
                    class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-pen"></i></a>
                </td>
                <td>
                    <a href="{{route('admin.funcionarios.view',$funcionario)}}"
                        class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-eye"></i></a>
                 </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    
{{ $funcionarios->withQueryString()->links() }}
@endsection