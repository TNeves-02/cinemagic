@extends('layout_admin')
@section('title','Alterar Filme' )
@section('content')
    <form method="POST" action="{{route('admin.filmes.update', ['filme' => $filme]) }}" class="form-group" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('filmes.partials.create-edit')
        @isset($filme->cartaz_url)
            <div class="form-group">
                <img src="{{$filme->cartaz_url ? asset('storage/cartazes/' . $filme->cartaz_url) : asset('img/default_img.png') }}"
                     alt="Foto do filme"  class="img-profile"
                     style="max-width:100%">
            </div>
        @endisset
        <div class="form-group text-right">
            @isset($filme->cartaz_url)
                <button type="submit" class="btn btn-danger" name="deletefoto" form="form_delete_photo">Apagar Foto</button>
            @endisset
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.filmes.edit', ['filme' => $filme]) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
    <form id="form_delete_photo" action="{{route('admin.filmes.foto.destroy', ['filme' => $filme])}}" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endsection
