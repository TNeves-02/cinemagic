@extends('layout_admin')
@section('title','Visualizar Funcionário' )
@section('content')
        @include('funcionarios.partials.create-edit')

        <div class="form-group">
                <img src="{{$funcionario->foto_url ? asset('storage/fotos/' .$funcionario->foto_url) : asset('img/default_img.jpg') }}"
                
                         alt="Foto do Funcionario"  class="img-profile"
                     style="max-width:100%">
            </div>
@endsection