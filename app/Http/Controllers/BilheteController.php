<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bilhete;
use App\Models\Filme;
use App\Models\Recibo;
use Illuminate\Support\Facades\Auth;

class BilheteController extends Controller
{
    public function index()
    {
        //por ano
        $bilhetes =  Recibo::where('cliente_id','=',Auth::id())
                            
                            ->get();
        dd($bilhetes);       

        return view('bilhetes.index');
    }

}
