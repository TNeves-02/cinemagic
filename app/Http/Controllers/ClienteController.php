<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function admin_index(){
        $qry = Cliente::query();
      
        $clientes = $qry->paginate(20);
        return view('clientes.admin')
            ->withClientes($clientes);
    }
}