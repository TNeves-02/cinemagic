@extends('layout')

@section('content')

<br><br><br><br>

<section class="filme-details spad">
    <div class="container">
        <div class="filme_details_content">
            <div class="row">
                <div class="col-lg-7">
                    <div class="filme_details_pic">
                        <img class="filme_details_pic" src="https://i.pinimg.com/736x/1a/1f/88/1a1f88dad9e014a86422b54a506480ed.jpg" alt="" />
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="filme_details_text">
                        <div class="filme_details_title">
                            <h3>Titulo</h3>
                            <span>Genero</span>
                        </div>
                        <p>Sumario</p>
                        <div class="filme_details_widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Ano:</span> 2022</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul>
                                        <li><span>Genero:</span> Aventura</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="filme_details_btn">
                            <i class="fa fa-ticket-simple"></i>
                            <a href="#" class="follow-btn"></i> Bilhetes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="embed-responsive embed-responsive-16by9" id="trailerfilme">
        <h3>Trailer</h3>
        <iframe width="960px" height="540px" class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
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
            <label class="card-carousel" for="item-1" id="movie-1">
                <img id="img-carousel" src="https://www.cinemacity.pt/images/products/DO_BAIRRO_1.jpg" alt="movie">
            </label>
            <label class="card-carousel" for="item-2" id="movie-2">
                <img id="img-carousel" src="https://www.cinemacity.pt/images/products/DO_BAIRRO_1.jpg" alt="movie">
            </label>
            <label class="card-carousel" for="item-3" id="movie-3">
                <img id="img-carousel" src="https://www.cinemacity.pt/images/products/DO_BAIRRO_1.jpg" alt="movie">
            </label>
        </div>
    </div>
</div>



@endsection