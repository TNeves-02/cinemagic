<div class="form-group">
 <label for="inputTitulo">Titulo</label>
  <input type="text" class="form-control" name="titulo" id="inputtitulo" value="{{old('titulo', $filme->titulo)}}"  />
    @error('titulo')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
  <label for="inputGenero">Genero</label>
  <select class="form-control" name="genero_code" id="inputGenero" >
      @foreach ($generos as $genero)
        <option value="{{$genero->code}}"  {{ old('genero_code', $filme->genero_code) == $genero->code ? 'selected' : ''}} >{{$genero->nome}}</option>
      @endforeach
  </select>
    @error('genero_code')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
  <label for="inputAno">Ano</label>
  <input type="number" class="form-control" name="ano" id="inputAno" value="{{old('ano', $filme->ano)}}"/>
    @error('ano')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
  <label for="inputSumario">Sumario</label>
  <input type="text" class="form-control" name="sumario" id="inputSumario" value="{{old('sumario', $filme->sumario)}}" />
    @error('sumario')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
  <label for="inputTrailer">Trailer</label>
  <input type="url" class="form-control" name="trailer" id="inputTrailer" value="{{old('trailer', $filme->trailer_url)}}"/>
    @error('trailer')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    <label for="inputCartaz">Cartaz</label> 
    <input type="file" class="form-control" name="cartaz_url" id="inputCartaz">
    @error('cartaz_url')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

