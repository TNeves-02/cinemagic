@extends('layout')

@section('content')

<section class="filme-details spad mt-5">
    <div class="container mt-3">
        <div class="filme_details_content">
            <div class="row">
                <div class="col-lg-7">
                    <div class="filme_details_pic">
                        <img src="/storage/cartazes/{{$filme->cartaz_url}}" style="width:450px;height:650px" />
                    </div>
                </div>
                <div class="col-lg-5">
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
                        <div class="filme_details_btn ms-5">
                            <button type="button" class="btn btn-outline-bg btn-lg btn-block" onclick="window.location.href='#sessao'"><i class="fas fa-fw fa-ticket me-2"></i>Bilhetes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sessao"></div>
    <br><br><br><br>
    @if ($sessoes->isEmpty())
    <hr class="col-lg-7 mt-5">
    <div class="col-lg-7 div-center mt-3">
        <br>
        <h2>Sem Sessões!</h2>
    </div>
    @else
    <form method="GET" action="{{route('filmes.filme', ['filme' => $filme]) }}" class="form-group">
        <div class="input-group mt-5">
            <h3 class="col-lg-7 text-center">Sessões</h3>
            <select class="custom-select" name="data" id="inputGernero" aria-label="Data">
                <option value="" {{'' == old('data', $selectedData) ? 'selected' : ''}}>Datas</option>
                @foreach ($datas as $data)
                    <option value={{$data->data}} {{$data->data == old('data', $selectedData) ? 'selected' : ''}}>{{$data->data}}</option>
                    @endforeach
            </select>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Filtrar</button>
            </div>
        </div>
    </form>
    <hr class="col-lg-7">
    <div class="col-lg-7 div-center mt-2">
    <table class="table table-striped table-dark text-light">
        <thead class="text-light">
            <tr>
                <th>Sala</th>
                <th>Data</th>
                <th>Hora</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($sessoes as $sessao)
            <tr>
                <td>{{$sessao->nome}}</td>
                <td>{{$sessao->data}}</td>
                <td >{{$sessao->horario_inicio}}</td>
                <td >
                <a href="{{route('lugares.index', ['filme' => $filme, 'sessao' => $sessao->id])}}"
                    class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fas fa-fw fa-ticket me-2"></i>Comprar</a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

    </div>

    @endif

    <hr class="col-lg-7 mt-5">

    <div class="embed-responsive embed-responsive-16by9 mt-5" id="trailerfilme" align="center">
        <h3>Trailer</h3>
        <br>
        <iframe width="960px" height="540px" class="embed-responsive-item" src="https://www.youtube.com/embed/{{ substr($filme->trailer_url, 32) }}" allowfullscreen></iframe></p>
    </div>
</section>

<br><br><br><br>

<h2 align="center"> Filmes Semelhantes</h2>
<div class="carousel">
    <div class="container">
        <input type="radio" name="slider" id="item-1" checked>
        <input type="radio" name="slider" id="item-2">
        <input type="radio" name="slider" id="item-3">
        <div class="cards">
            <label class="card-carousel" for="item-1" id="movie-1">
                <a href="{{route('filmes.filme', $semelhantes[0])}}">
                    <img id="img-carousel" src="{{ asset('storage/cartazes/'.$semelhantes[0]->cartaz_url) }}" alt="movie">
                </a>
            </label>
            <label class="card-carousel" for="item-2" id="movie-2">
                <a href="{{route('filmes.filme', $semelhantes[1])}}">
                    <img id="img-carousel" src="{{ asset('storage/cartazes/'.$semelhantes[1]->cartaz_url) }}" alt="movie">
                </a>
            </label>
            <label class="card-carousel" for="item-3" id="movie-3">
                <a href="{{route('filmes.filme', $semelhantes[2])}}">
                    <img id="img-carousel" src="{{ asset('storage/cartazes/'.$semelhantes[2]->cartaz_url) }}" alt="movie">
                </a>
            </label>
        </div>
    </div>
</div>



@endsection