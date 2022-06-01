@extends('layout')

@section('content')

<br><br><br><br>
<h2 class="ult-lancamentos">Últimos Lançamentos</h2>
<div class="carousel">
    <div class="container">
        <input type="radio" name="slider" id="item-1" checked>
        <input type="radio" name="slider" id="item-2">
        <input type="radio" name="slider" id="item-3">
        <div class="cards">
            <label class="card-carousel" for="item-1" id="movie-1">               
                <img id="img-carousel" src="storage/cartazes/{{$ultLancamentos[0]->cartaz_url}}" alt="movie">            
            </label>    
            <label class="card-carousel" for="item-2" id="movie-2">
                <img id="img-carousel" src="storage/cartazes/{{$ultLancamentos[1]->cartaz_url}}" alt="movie">     
            </label>
            <label class="card-carousel" for="item-3" id="movie-3">
                <img id="img-carousel" src="storage/cartazes/{{$ultLancamentos[2]->cartaz_url}}" alt="movie">  
            </label>
        </div>
    </div>
</div>

<div class="container-movie" style="background-color: #272829;">
    <p>Proximas Sessões</p>
</div>

<br><br><br>

<div class="container-movie" style="background-color: #272829;">
    <p>Filmes Mais vistos</p>
</div>




@endsection