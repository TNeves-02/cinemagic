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
        $recibos =  Recibo::select('*')
                            ->where('cliente_id',Auth::id())
                            //->paginate(20);
                            ->get();
        dd($recibos);

        return view('recibos.index')->withRecibos($recibos);
                    
    }
}
