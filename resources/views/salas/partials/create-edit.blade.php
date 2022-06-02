<div class="form-group">
 <label for="inputTitulo">Nome</label>
  <input type="text" class="form-control" name="nome" id="inputtitulo" value="{{old('nome', $sala->nome)}}"  />
    @error('nome')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

