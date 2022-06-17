@extends('layout')

@section('content')

<br><br>
<h2 class="ult-lancamentos mt-5">Últimos Lançamentos</h2>
<div class="carousel">
  <div class="container">
    <input type="radio" name="slider" id="item-1" checked>
    <input type="radio" name="slider" id="item-2">
    <input type="radio" name="slider" id="item-3">
    <div class="cards">
      <label class="card-carousel" for="item-1" id="movie-1">
        <a href="{{route('filmes.filme', $ultLancamentos[0])}}">
          <img id="img-carousel"src="{{$ultLancamentos[0]->cartaz_url ? asset('storage/cartazes/'  . $ultLancamentos[0]->cartaz_url) : asset('img/no-available.jpg') }}" alt="movie">

       
        </a>
      </label>
      <label class="card-carousel" for="item-2" id="movie-2">
        <a href="{{route('filmes.filme', $ultLancamentos[1])}}">
          <img id="img-carousel" src="{{$ultLancamentos[1]->cartaz_url ? asset('storage/cartazes/'  . $ultLancamentos[1]->cartaz_url) : asset('img/no-available.jpg') }}" alt="movie">
        </a>
      </label>
      <label class="card-carousel" for="item-3" id="movie-3">
        <a href="{{route('filmes.filme', $ultLancamentos[2])}}">
          <img id="img-carousel"   src="{{$ultLancamentos[2]->cartaz_url ? asset('storage/cartazes/'  . $ultLancamentos[2]->cartaz_url) : asset('img/no-available.jpg') }}"  alt="movie">
        </a>
      </label>
    </div>
  </div>
</div>
<br><br><br>

<h2 class="m-Sessoes">Próximas Sessões</h2>
<hr class="col-lg-8">
<div class="col-lg-8 div-center mt-2">
  <table class="table table-striped table-dark text-light">
      <thead class="text-light">
          <tr>
              <th>Nome do Filme</th>
              <th>Sala</th>
              <th>Data</th>
              <th>Hora</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
          @foreach ($proximasSessoes as $sessao)
          <tr>
              <td><a href="{{route('filmes.filme', $sessao)}}" style="text-decoration:none; color:white" aria-pressed="true">{{$sessao->titulo}}</a></td>
              <td>{{$sessao->nome}}</td>
              <td>{{$sessao->data}}</td>
              <td >{{$sessao->horario_inicio}}</td>
              <td >
              <a href="{{route('lugares.index', ['filme' => $sessao, 'sessao' => $sessao->sessionId])}}" class="btn btn-outline-light btn-sm" role="button" aria-pressed="true"><i class="fas fa-fw fa-ticket me-2"></i>Comprar</a>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
<hr class="col-lg-8">
<br><br><br>
<h2 class="m-Vistos">Filmes Mais Vistos</h2>
<div class="carousel">
  <div class="container">
    <input type="radio" name="slider2" id="itemMaisVistos-1" checked>
    <input type="radio" name="slider2" id="itemMaisVistos-2">
    <input type="radio" name="slider2" id="itemMaisVistos-3">
    <div class="cards">
      <label class="card-carousel" for="itemMaisVistos-1" id="movieMaisVistos-1">
        <a href="{{route('filmes.filme', $maisVistos[0])}}">
          <img id="img-carousel"  src="{{$maisVistos[0]->cartaz_url ? asset('storage/cartazes/'  . $maisVistos[0]->cartaz_url) : asset('img/no-available.jpg') }}" alt="movie">
        
        </a>
      </label>
      <label class="card-carousel" for="itemMaisVistos-2" id="movieMaisVistos-2">
        <a href="{{route('filmes.filme', $maisVistos[1])}}">
          <img id="img-carousel"    src="{{$maisVistos[1]->cartaz_url ? asset('storage/cartazes/'  . $maisVistos[1]->cartaz_url) : asset('img/no-available.jpg') }}" alt="movie">
        </a>
      </label>
      <label class="card-carousel" for="itemMaisVistos-3" id="movieMaisVistos-3">
        <a href="{{route('filmes.filme', $maisVistos[2])}}">
          <img id="img-carousel"    src="{{$maisVistos[2]->cartaz_url ? asset('storage/cartazes/'  . $maisVistos[2]->cartaz_url) : asset('img/no-available.jpg') }}" alt="movie">

         
        </a>
      </label>

    </div>
  </div>
</div>
@endsection