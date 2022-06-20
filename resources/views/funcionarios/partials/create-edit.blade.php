<div class="form-group">
 <label for="inputNome">Nome</label>
  <input type="text" class="form-control" name="name" id="inputNome" value="{{old('name', $funcionario->name)}}" @if (Route::getCurrentRoute()->getName() == "admin.funcionarios.view") disabled @endif/>
    @error('name')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
 <label for="inputEmail">Email</label>
  <input type="email" class="form-control" name="email" id="inputEmail" value="{{old('email', $funcionario->email)}}" @if (Route::getCurrentRoute()->getName() == "admin.funcionarios.view") disabled @endif />
    @error('email')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>


<div class="form-group">
    <label for="inputPassword">Password</label>
    
     <input type="password" class="form-control" name="password" id="inputPassword" value="{{old('password', $funcionario->password)}}"  @if (Route::getCurrentRoute()->getName() == "admin.funcionarios.view") disabled @endif  />
    
       @error('password')
           <div class="small text-danger">{{$message}}</div>
       @enderror
</div>


<div class="form-group">
    <label for="inputTipoFuncionario">Tipo</label>
    <select class="form-control" name="tipo" id="inputTipoFuncionario" @if (Route::getCurrentRoute()->getName() == "admin.funcionarios.view") disabled @endif>
          <option value="A"{{ old('tipo', $funcionario->tipo) == "A" ? 'selected' : ''}}  >Administrador</option>
          <option value="F"{{ old('tipo', $funcionario->tipo) == "F" ? 'selected' : ''}}  >Funcionario</option>
    </select>
     
       @error('tipo')
           <div class="small text-danger">{{$message}}</div>
       @enderror
</div>
<div class="form-group">
    <label for="inputFoto">Foto</label> 
    @if (Route::getCurrentRoute()->getName() != "admin.funcionarios.view")
    <input type="file" class="form-control" name="foto_url" id="inputFoto" >
    @endif
    @error('foto_url')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <input type="text" class="form-control" name="bloqueado" value="0" hidden>
</div>





