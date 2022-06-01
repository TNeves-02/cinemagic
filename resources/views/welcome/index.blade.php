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
  <div class="container">
    <h1>Use Bootstrap 3's carousel to show multiple items per slide.</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="carousel slide multi-item-carousel" id="theCarousel">
          <div class="carousel-inner">
            <div class="item active">
              <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?perth,australia" class="img-responsive"></a></div>
            </div>
            <div class="item">
              <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?fremantle,australia" class="img-responsive"></a></div>
            </div>
            <div class="item">
              <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?west-australia" class="img-responsive"></a></div>
            </div>
            <div class="item">
              <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?perth" class="img-responsive"></a></div>
            </div>
            <div class="item">
              <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?quokka,perth" class="img-responsive"></a></div>
            </div>
            <div class="item">
              <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?margaretriver,australia" class="img-responsive"></a></div>
            </div>
            <!-- add  more items here -->
            <!-- Example item start:  -->

            <div class="item">
              <div class="col-xs-4"><a href="#1"><img src="https://source.unsplash.com/300x300/?perth,australia&r=7" class="img-responsive"></a></div>
            </div>

            <!--  Example item end -->
          </div>
          <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
          <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection