<div class="form-group">
 <label for="inputNome">Nome</label>
  <input type="text" class="form-control" name="nome" id="inputNome" value="{{old('nome', $sala->nome)}}"  @if (Route::getCurrentRoute()->getName() == "admin.salas.view") disabled @endif/>
    @error('nome')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<br>
<h3>Disposição da sala</h3>

<div class="form-group">
    <label for="inputFilas">Número de filas</label>
     <input type="number" class="form-control" name="filas" id="inputFilas"  @if (Route::getCurrentRoute()->getName() == "admin.salas.view")  value="{{$numFilas}}" disabled @endif/>
    
   </div>

<div class="form-group">
    <label for="inputPosicao">Número de lugares por fila</label>
     <input type="number" class="form-control" name="colunas" id="inputPosicao"  @if (Route::getCurrentRoute()->getName() == "admin.salas.view")  value="{{$numColunas}}" disabled @endif/>
     
   </div>