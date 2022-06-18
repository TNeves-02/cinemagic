@extends('layout')

@section('content')


<div class="container-movie" id="movie-style">
    <div class="d-flex justify-content-between mx-5 px-5">
        <div><h1 class="text-white">Filmes</h1></div>
    <div>
        <form method="GET" class="form-group" style="align-items: center; text-align:center">
            <div class="input-group">
                <select class="custom-select" name="genero" id="inputGernero" aria-label="Genero">
                    <option value="" {{'' == old('genero', $selectedGenero ) ? 'selected' : ''}}>Todos Generos</option>
                    @foreach ($generos as $genero)
                    <option value={{$genero->code}} {{$genero->code == old('genero', $selectedGenero) ? 'selected' : ''}}>{{$genero -> nome}}</option>
                    @endforeach
                </select>


                <input type="text" class="form-control" name="titulo" id="inputTitulo" placeholder="Titulo do Filme">

                <select class="custom-select" name="ano" id="inputGernero" aria-label="Ano">
                    <option value="" {{'' == old('ano', $selectedAno ) ? 'selected' : ''}}>Ano</option>
                    @foreach ($anos as $ano)
                    <option value={{$ano->ano}} {{$ano->ano == old('ano', $selectedAno) ? 'selected' : ''}}>{{$ano->ano}}</option>
                    @endforeach
                </select>

                <select class="custom-select" name="sessoes" id="inputGernero" aria-label="sessao">
                    <option value="" {{'' == old('sessoes', $selectedSessao ) ? 'selected' : ''}}>Sessões</option>
                    <option value="1" {{1 == old('sessoes', $selectedSessao) ? 'selected' : ''}}>Sim</option>
                    <option value="0" {{0 == old('sessoes', $selectedSessao) ? 'selected' : ''}}>Nao</option>
                </select>


                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Filtrar</button>
                </div>

            </div>
        </form>
    </div>
    </div>
   

    @foreach($filmes as $filme)

    <div class="movie-card">
        <div class="movie-header">
            <img class="img-fluid" style="min-width:300px;" src="{{$filme->cartaz_url ? asset('storage/cartazes/'  . $filme->cartaz_url) : asset('img/no-available.jpg') }}">


        </div>
        <!--movie-header-->
        <div class="movie-content">
            <div class="movie-content-header">
                <a href="{{route('filmes.filme', $filme)}}">
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
</div>
<div class="paginacao d-flex justify-content-center">
    {{ $filmes->withQueryString()->links() }}
</div>

@endsection