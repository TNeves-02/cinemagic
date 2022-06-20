<div class="form-group">
  <label for="inputFilme">Filme</label>
  <select class="form-control" name="filme_id" id="inputFilme"  @if (Route::getCurrentRoute()->getName() == "admin.sessoes.view") disabled @endif>
      @foreach ($filmes as $filme)
        <option value="{{$filme->id}}"  {{ old('filme_id', $sessao->filme_id) == $filme->id ? 'selected' : ''}} >{{$filme->titulo}}</option>
      @endforeach
  </select>
    @error('filme_id')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
  <label for="inputSala">Sala</label>
  <select class="form-control" name="sala_id" id="inputSala"  @if (Route::getCurrentRoute()->getName() == "admin.sessoes.view") disabled @endif>
      @foreach ($salas as $sala)
        <option value="{{$sala->id}}"  {{ old('sala_id', $sessao->sala_id) == $sala->id ? 'selected' : ''}} >{{$sala->nome}}</option>
      @endforeach
  </select>
    @error('sala_id')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>



<div class="form-group">
 <label for="inputData">Data</label>
  <input type="date" class="form-control" name="data" id="inputData" value="{{old('data', $sessao->data)}}"  @if (Route::getCurrentRoute()->getName() == "admin.sessoes.view") disabled @endif />
    @error('data')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
 <label for="inputHora">Hora de inicio</label>
  <input type="time" class="form-control" name="horario_inicio" id="inputHora" value="{{old('horario_inicio', $sessao->horario_inicio)}}"  @if (Route::getCurrentRoute()->getName() == "admin.sessoes.view") disabled @endif />
    @error('horario_inicio')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
