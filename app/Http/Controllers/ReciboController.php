<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Recibo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReciboController extends Controller
{
    public function index()
    {
        $recibos =  Recibo::where('cliente_id',Auth::id())
                            ->get();
                   
        

        foreach ($recibos as $recibo) {
        
            dd($recibo->bilhete[0]->id);
            
        }
        return view('recibos.index')->withRecibos($recibos);
                    
    }
}
