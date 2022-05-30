@extends('layout')

@section('content')


<div class="container-movie" style="background-color: #272829;">
    <form method="GET" class="form-group" id="form-filter">
    <div class="input-group ">
            <select class="custom-select rounded" name="curso" id="inputCurso" aria-label="Curso">
                
                @foreach ($generos as $genero)
                
                <option value="">{{$genero->nome}}</option>
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
                    <label>Date & Time</label>
                    <span>Sun 8 Sept - 10:00PM</span>
                </div>
                <!--date,time-->
                <div class="info-section">
                    <label>Screen</label>
                    <span>03</span>
                </div>
                <!--screen-->
                <div class="info-section">
                    <label>Row</label>
                    <span>F</span>
                </div>
                <!--row-->
                <div class="info-section">
                    <label>Seat</label>
                    <span>21,22</span>
                </div>
                <!--seat-->
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