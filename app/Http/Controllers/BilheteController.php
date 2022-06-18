<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recibo;
use App\Models\Bilhete;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class BilheteController extends Controller
{

    public function admin_index(Request $request){
        $qry = Bilhete::query();
      
        $nome = $request->nome ?? '';
        $data = $request->data ?? '';
        if ($nome) {
            $id_user = User::select('id')->where([['name','LIKE', '%' . $nome . '%'],['tipo',"C"]])->get();
           
            for ($i=0; $i < count($id_user) ; $i++) { 
                $qry->orWhere('cliente_id', $id_user[$i]->id)->get();
            }
        }

        $bilhetes = $qry->paginate(20);
        return view('bilhetes.admin')
            ->withBilhetes($bilhetes)
            ->withNome($nome);
    }

}
