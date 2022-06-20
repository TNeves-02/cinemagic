<div class="form-group">
 <label for="inputTitulo">Preco Bilhete Sem Iva</label>
  <input type="number" step=0.01 class="form-control" name="preco_bilhete_sem_iva" id="preco_bilhete_sem_iva" value="{{old('preco_bilhete_sem_iva', $configuracao[0]->preco_bilhete_sem_iva)}}" />
    @error('preco_bilhete_sem_iva')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
 <label for="inputTitulo">Percentagem Iva</label>
  <input type="number" class="form-control" name="percentagem_iva" id="percentagem_iva" value="{{old('percentagem_iva', $configuracao[0]->percentagem_iva)}}" />
    @error('percentagem_iva')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>


