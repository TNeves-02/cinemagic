<div class="form-group">
  <label for="inputSala">Sala</label>
  <select class="form-control" name="sala_id" id="inputSala"  @if (Route::getCurrentRoute()->getName() == "admin.sessoes.view") disabled @endif>
      @foreach ($salas as $sala)
        <option value="{{$sala->id}}"  {{ old('sala_id', $lugar->sala_id) == $sala->id ? 'selected' : ''}} >{{$sala->nome}}</option>
      @endforeach
  </select>
    @error('sala_id')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>


<h5>quero apenas que o utilizado coloque o nomero de colunas ou de linhas a adicionar na sala!!!!!!!</h5>


