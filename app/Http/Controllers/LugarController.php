<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Sala;
use App\Models\Filme;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    public function admin_index(){
        $qry = Lugar::query();
      
        $lugares = $qry->paginate(20);
        return view('lugares.admin')
            ->withLugares($lugares);
    }

    public function create()
    {
        $lugar = new Lugar();
        $salas = Sala::all();
        return view('lugares.create')
            ->withLugar($lugar)
            ->withSalas($salas);
    }

    public function lugares(Filme $filme , $sala)
    {
        $nLugaresTotal = Lugar::where('sala_id',$sala)->count();
        $filas = Lugar::select('fila')->where('sala_id',$sala)->distinct()->get();
        $nlugaresFila = Lugar::select('fila')->where('sala_id',$sala)->groupBy('fila')->count();
        
        return view('lugares.index')
                     ->withFilas($filas)
                     ->withLugaresTotal($nLugaresTotal)
                     ->withLugaresFila($nlugaresFila);
                    
           
    }

}
