@extends('layout')

@section('content')

<br><br><br><br><br><br>
<section class="filme-details spad">
    <div class="container">
        <div class="filme_details_content">
            <div class="row">
                <div class="col-lg-7">
                    <div class="filme_details_pic">
                        <img src="/storage/cartazes/{{$filme->cartaz_url}}" style="width:450px;height:650px" />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="filme_details_text">
                        <div class="filme_details_title">
                            <h3>{{ $filme->titulo }}</h3>
                            <!--<span>Genero</span>-->
                        </div>
                        <div class="filme_details_widget">
                            <div class="row">
                                <div class="col-lg-15 col-md-15">
                                    <ul>
                                        <li><span>Ano:</span> {{ $filme->ano }}</li>
                                    </ul>
                                </div>
                                <div class="col-lg-15 col-md-15">
                                    <ul>
                                        <li><span>Genero:</span> {{ $filme->genero->nome }}</li>
                                    </ul>
                                </div>
                                <div class="col-lg-15 col-md-15">
                                    <ul>
                                        <li><span>Sumario:</span><br> {{ $filme->sumario }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="filme_details_btn">
                                <i class="fa fa-ticket-simple"></i>
                                <button type="button" class="btn btn-light btn-block" onclick="window.location.href='#">Bilhetes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
    <div class="embed-responsive embed-responsive-16by9" id="trailerfilme" align="center">
        <h3>Trailer</h3>
        <br>
        <iframe width="960px" height="540px" class="embed-responsive-item" src="https://www.youtube.com/embed/{{ substr($filme->trailer_url, 32) }}" allowfullscreen></iframe></p>
    </div>
</section>

<br><br><br><br>

<h2 class="ult-lancamentos"> Filmes Semelhantes</h2>
<div class="carousel">
    <div class="container">
        <input type="radio" name="slider" id="item-1" checked>
        <input type="radio" name="slider" id="item-2">
        <input type="radio" name="slider" id="item-3">
        <div class="cards">
            @foreach($semelhantes as $semelhante)
                <a href="{{route('filmes.filme', $semelhante)}}"><input type="radio" name="slider" id="item-{{$semelhante->id}}">
                    <label class="card-carousel" for="item-{{$semelhante->id}}" id="movie-{{$semelhante->id}}">               
                        <img id="img-carousel" src="{{ asset('storage/cartazes/'.$semelhante->cartaz_url) }}" alt="movie">            
                    </label>
                </a>
            @endforeach
        </div>
    </div>
</div>



@endsection