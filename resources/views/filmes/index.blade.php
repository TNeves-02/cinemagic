@extends('layout')

@section('content')


<div class="container-movie"  id="movie-style">

    @foreach($filmes as $filme)

    <div class="movie-card">
        <div class="movie-header">
            <img class="img-fluid" style="min-width:300px;" src="{{$filme->cartaz_url ? asset('storage/cartazes/'  . $filme->cartaz_url) : asset('img/no-available.jpg') }}">

            
        </div>
        <!--movie-header-->
        <div class="movie-content">
            <div class="movie-content-header">
                <a href="{{route('filmes.filme', $filme)}}">
                    <h3 class="movie-title">{{$filme->titulo}}</h3>
                </a>
            </div>
            <div class="movie-info">
                <div class="info-section">
                    <label>Género</label>
                    <span>{{$filme->genero->nome}}</span>
                </div>
                <!--date,time-->
                <div class="info-section">
                    <label>Ano</label>
                    <span>{{$filme->ano}}</span>
                </div>
            </div>
        </div>
        <!--movie-content-->
    </div>
    <!--movie-card-->
    @endforeach    
</div>
<div class="paginacao d-flex justify-content-center">
        {{ $filmes->withQueryString()->links() }}
</div>

@endsection