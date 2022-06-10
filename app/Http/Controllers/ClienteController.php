<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientePost;

class ClienteController extends Controller
{
    public function admin_index(){
        $qry = Cliente::query();
      
        $clientes = $qry->paginate(20);
        return view('clientes.admin')
            ->withClientes($clientes);
    }

    public function perfil(){      
        $cliente = Cliente::all();

        
        return view('clientes.perfil')
            ->withCliente($cliente);
    }

    public function editarPerfil(){
    
        

            return view('clientes.editar');
    }

    public function update(ClientePost $request,User $user)
    {

        dd($request);
        $user->fill($request->validated());

        $user->save();
        return redirect()->route('cliente.edit')
            ->with('alert-msg', 'Cliente "' . $user->nome . '" foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }
}
