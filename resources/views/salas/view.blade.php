@extends('layout_admin')
@section('title','Visualizar Filme' )
@section('content')
        @include('filmes.partials.create-edit')
        @isset($filme->cartaz_url)
            <div class="form-group">
                <img src="{{$filme->cartaz_url ? asset('storage/cartazes/' . $filme->cartaz_url) : asset('img/default_img.png') }}"
                     alt="Foto do docente"  class="img-profile"
                     style="max-width:100%">
            </div>
        @endisset
@endsection