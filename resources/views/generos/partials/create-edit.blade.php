<div class="form-group">
 <label for="inputTitulo">Code</label>
  <input type="text" class="form-control" name="code" id="inputtitulo" value="{{old('code', $genero->code)}}"  @if (Route::getCurrentRoute()->getName() == "admin.generos.view") disabled @endif/>
    @error('code')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
 <label for="inputTitulo">Nome</label>
  <input type="text" class="form-control" name="nome" id="inputtitulo" value="{{old('nome', $genero->nome)}}"  @if (Route::getCurrentRoute()->getName() == "admin.generos.view") disabled @endif/>
    @error('nome')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>




