<?php

namespace App\Http\Controllers;

use App\Models\Bilhete;
use App\Models\Filme;
use App\Models\Recibo;
use Faker\Provider\Biased;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReciboController extends Controller
{
    public function index()
    {
        $recibos =  Recibo::where('cliente_id',Auth::id())                    
                            ->paginate(10);
                   
        return view('recibos.index')->withRecibos($recibos);                    
    }

    public function historico(Recibo $recibo)
    {

        $bilhetes =  Bilhete::where('recibo_id',$recibo->id)
                            ->get();
                   
        return view('recibos.recibo')->withRecibo($recibo)
                                     ->withBilhetes($bilhetes);                    
    }
}


