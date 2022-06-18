<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientePost;

class ClienteController extends Controller
{
 
    public function perfil(){      
        $cliente = Cliente::all();
        
        return view('clientes.perfil')
            ->withCliente($cliente);
    }

    public function editarPerfil(){

            return view('clientes.editar');
    }

    public function update(User $user,Request $request)
    {
      
       if($user->tipo == "A"){
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        }
        elseif ($user->tipo == "C"){
            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            $user->cliente->fill([
                'nif' => $request->nif,
                'tipo_pagamento' => $request->tipo_pagamento,
                'ref_pagamento' => $request->ref_pagamento,
            ]);
            
         }

        $user->save();
        $user->cliente->save();
        return redirect()->route('clientes.editar')
            ->with('alert-msg', 'Cliente "' . $user->nome . '" foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function admin_index(Request $request){
        $qry = Cliente::query();

        $nome = $request->nome ?? '';
       
        if ($nome) {
            $id_user = User::select('id')->where([['name','LIKE', '%' . $nome . '%'],['tipo',"C"]])->get();
           
            for ($i=0; $i < count($id_user) ; $i++) { 
                $qry->orWhere('id', $id_user[$i]->id)->get();
            }
           
        }
        $clientes = $qry->paginate(20);
        return view('clientes.admin')
            ->withClientes($clientes)
            ->withNome($nome);
    }

    public function block(Cliente $cliente){
       
       if ( $cliente->user->bloqueado == 0) {
        $cliente->user->fill([
            'bloqueado' => 1]);
         $cliente->user->save();
       }elseif($cliente->user->bloqueado == 1){
        $cliente->user->fill([
            'bloqueado' => 0]);
         $cliente->user->save();
       }
      

         return redirect()->route('admin.clientes')
                             ->with('alert-msg', 'Cliente "' .$cliente->user->name . '" foi bloqueado/desbloqueado!')
                             ->with('alert-type', 'success');
    }

    public function destroy(Cliente $cliente)
    {
        $nomeCliente = $cliente->user->name;
        try {
            $cliente->user->delete();
            $cliente->delete();
            return redirect()->route('admin.clientes')
                ->with('alert-msg', 'Cliente "' . $nomeCliente. '" foi apagado com sucesso!')
                ->with('alert-type', 'success');
        } catch (\Throwable $th) {
            
            if ($th->errorInfo[1] == 1451) {  
                return redirect()->route('admin.clientes')
                    ->with('alert-msg', 'Não foi possível apagar o Cliente"' . $nomeCliente . '", porque este cliente já está em uso!')
                    ->with('alert-type', 'danger');
            } else {
                return redirect()->route('admin.clientes')
                    ->with('alert-msg', 'Não foi possível apagar  o Cliente "' . $nomeCliente . '". Erro: ' . $th->errorInfo[2])
                    ->with('alert-type', 'danger');
            }
        }
    }

}
