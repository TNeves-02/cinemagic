@extends('layout_admin')
@section('title','Alterar Sala' )
@section('content')
    <form method="POST" action="{{route('admin.salas.update', ['sala' => $sala]) }}" class="form-group" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('salas.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.salas.edit', ['sala' => $sala]) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
