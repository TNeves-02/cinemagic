@extends('layout_admin')
@section('title','Alterar Sessao' )
@section('content')
    <form method="POST" action="{{route('admin.sessoes.update', ['sessao' => $sessao]) }}" class="form-group" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('sessoes.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.sessoes.edit', ['sessao' => $sessao]) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
