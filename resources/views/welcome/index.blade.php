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
        <a href="*?">
          <img id="img-carousel" src="storage/cartazes/{{$ultLancamentos[2]->cartaz_url}}" alt="movie">
        </a>
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
  <!--Carousel Wrapper-->
  <!-- Top content -->
  <div class="top-content">
    <div class="container-fluid">
      <div id="carousel-example" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
          <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
            <img src="https://source.unsplash.com/300x300/?fremantle,australia" class="img-fluid mx-auto d-block" alt="img1">
          </div>
          <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
            <img src="https://source.unsplash.com/300x300/?fremantle,australia" class="img-fluid mx-auto d-block" alt="img2">
          </div>
          <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
            <img src="https://source.unsplash.com/300x300/?fremantle,australia" class="img-fluid mx-auto d-block" alt="img3">
          </div>
          <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
            <img src="https://source.unsplash.com/300x300/?fremantle,australia" class="img-fluid mx-auto d-block" alt="img4">
          </div>
          <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
            <img src="https://source.unsplash.com/300x300/?fremantle,australia" class="img-fluid mx-auto d-block" alt="img5">
          </div>
          <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
            <img src="https://source.unsplash.com/300x300/?fremantle,australia" class="img-fluid mx-auto d-block" alt="img6">
          </div>
          <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
            <img src="https://source.unsplash.com/300x300/?fremantle,australia" class="img-fluid mx-auto d-block" alt="img7">
          </div>
          <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
            <img src="https://source.unsplash.com/300x300/?fremantle,australia" class="img-fluid mx-auto d-block" alt="img8">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
  @endsection