@extends('layout')

@section('content')

<br>
<h2 class="ult-lancamentos">Últimos Lançamentos</h2>
<div class="carousel">
    <div class="container">
        <input type="radio" name="slider" id="item-1" checked>
        <input type="radio" name="slider" id="item-2">
        <input type="radio" name="slider" id="item-3">
        <div class="cards">
            <label class="card-carousel" for="item-1" id="movie-1">
                <img id="img-carousel" src="https://images.unsplash.com/photo-1530651788726-1dbf58eeef1f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=882&q=80" alt="movie">
            </label>
            <label class="card-carousel" for="item-2" id="movie-2">
                <img id="img-carousel" src="https://images.unsplash.com/photo-1559386484-97dfc0e15539?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1234&q=80" alt="movie">
            </label>
            <label class="card-carousel" for="item-3" id="movie-3">
                <img id="img-carousel" src="https://images.unsplash.com/photo-1533461502717-83546f485d24?ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="movie">
            </label>
        </div>
    </div>
</div>

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
<!--container-->

<br><br><br>




<br><br><br>

<br><br><br>

<br><br><br>

<br><br><br>


@endsection