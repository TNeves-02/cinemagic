@extends('layout_admin')
@section('title','Alterar Configurações' )
@section('content')
    <form method="POST" action="{{route('admin.configuracao.update')}}" class="form-group" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('configuracao.partials.create-edit')      
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.configuracao.edit')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
