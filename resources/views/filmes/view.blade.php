@extends('layout_admin')
@section('title','Visualizar Filme' )
@section('content')
        @include('filmes.partials.create-edit')
        
            <div class="form-group">
                <img src="{{$filme->cartaz_url ? asset('storage/cartazes/' . $filme->cartaz_url) : asset('img/no-available.jpg') }}"
                
                         alt="Foto do Filme"  class="img-profile"
                     style="max-width:100%">
            </div>
      
@endsection