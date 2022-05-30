@extends('layout')

@section('content')


<div class="container-movie" style="background-color: #272829;">
    <form method="GET" class="form-group" id="form-filter">
    <div class="input-group ">
            <select class="custom-select rounded" name="genero" id="inputGenero" aria-label="Genero">
                
                @foreach ($generos as $genero)
                
                <option value="">{{$genero->nome}}</option>
                @endforeach
            </select>
            
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Filtrar</button>
            </div>
        </div>
    </form>
    <form method="GET" class="form-group" id="form-filter">
    <div class="input-group ">
            <select class="custom-select rounded" name="curso" id="inputCurso" aria-label="Curso">
                <!-- Como ordenar a data -->
                @foreach ($anos as $ano)                
                <option value="">{{$ano->ano}}</option>
                @endforeach
            </select>
            
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Filtrar</button>
            </div>
        </div>
    </form>
</div>

<div class="container-movie" id="movie-style">

    @foreach($filmes as $filme)
    <div class="movie-card">
        <div class="movie-header" style="background:url(storage/cartazes/{{$filme->cartaz_url}});">

        </div>
        <!--movie-header-->
        <div class="movie-content">
            <div class="movie-content-header">
                <a href="#">
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
    <div class="paginacao">
        {{ $filmes->withQueryString()->links() }}
    </div>
</div>

@endsection