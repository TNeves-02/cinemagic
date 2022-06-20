<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\FuncionarioPost;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FuncionarioController extends Controller
{
    public function admin_index(Request $request){
        $qry = User::query();

        $qry->where('tipo',"A")->orWhere('tipo','F')->get();

        $funcionarios = $qry->paginate(20);
        return view('funcionarios.admin')
            ->withFuncionarios($funcionarios);
    }


    
    public function block(User $funcionario){
       
        if ( $funcionario->bloqueado == 0) {
         $funcionario->fill([
             'bloqueado' => 1]);
          $funcionario->save();
        }elseif($funcionario->bloqueado == 1){
         $funcionario->fill([
             'bloqueado' => 0]);
          $funcionario->save();
        }
       
          return redirect()->route('admin.funcionarios')
                              ->with('alert-msg', 'Cliente "' .$funcionario->name . '" foi bloqueado/desbloqueado!')
                              ->with('alert-type', 'success');
     }

     public function destroy(User $funcionario)
     {
         $nomeFuncionario = $funcionario->name;
         try {
             $funcionario->delete();
             return redirect()->route('admin.funcionarios')
                 ->with('alert-msg', 'Funcionario "' . $nomeFuncionario. '" foi apagado com sucesso!')
                 ->with('alert-type', 'success');
         } catch (\Throwable $th) {
             
             if ($th->errorInfo[1] == 1451) {  
                 return redirect()->route('admin.funcionarios')
                     ->with('alert-msg', 'Não foi possível apagar o Funcionario"' . $nomeFuncionario . '", porque este cliente já está em uso!')
                     ->with('alert-type', 'danger');
             } else {
                 return redirect()->route('admin.funcionarios')
                     ->with('alert-msg', 'Não foi possível apagar  o Funcionario "' . $nomeFuncionario . '". Erro: ' . $th->errorInfo[2])
                     ->with('alert-type', 'danger');
             }
         }
     }



     public function create()
    {
        $funcionario = new User();
        return view('funcionarios.create')
            ->withfuncionario($funcionario);
    }

    public function store(FuncionarioPost $request)
    {
        $newFuncionario = User::create($request->validated());
       $newFuncionario->password = Hash::make($request->password);
       if ($request->hasFile('foto_url')) {
        $path = $request->foto_url->store('public/fotos');
        $newFuncionario->foto_url = basename($path);
    }
        $newFuncionario->save();

        return redirect()->route('admin.funcionarios')
            ->with('alert-msg', 'Funcionario "' . $newFuncionario->name . '" foi criado com sucesso!')
            ->with('alert-type', 'success');
    }


    public function edit(User $funcionario)
    {
        
        return view('funcionarios.edit')
            ->withFuncionario($funcionario);
    }

    public function update(FuncionarioPost $request, User $funcionario)
    {
        $funcionario->fill($request->validated());

        if ($request->hasFile('foto_url')) {
            Storage::delete('public/fotos/' . $funcionario->foto_url);
            $path = $request->foto_url->store('public/fotos');
            $funcionario->foto_url = basename($path);
        }
        $funcionario->save();
        return redirect()->route('admin.funcionarios')
            ->with('alert-msg', 'Funcionario "' . $funcionario->name . '" foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function destroy_foto(User $funcionario)
    {
        Storage::delete('public/fotos/' . $funcionario->foto_url);
        $funcionario->foto_url = null;
        $funcionario->save();
        return redirect()->route('admin.funcionarios.edit', ['funcionario' => $funcionario])
            ->with('alert-msg', 'Foto do funcionario "' . $funcionario->name . '" foi removida!')
            ->with('alert-type', 'success');
    }


    
    public function view(User $funcionario)
    {
    return view('funcionarios.view')
    ->withFuncionario($funcionario);
    }
 
}
