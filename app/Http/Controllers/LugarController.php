<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Sala;
use App\Models\Filme;
use App\Models\Sessao;
use App\Models\Bilhete;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;

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

    public function lugares(Filme $filme , $sessao_id )
    {
        

        $bilhetes = Bilhete::where('sessao_id',$sessao_id)->where('estado',"nao usado")->get();
        $sala_id = Sessao::select('sala_id')->where('id',$sessao_id)->first()->sala_id ?? null ;
        $nlugaresFila = Lugar::select('fila')->where('sala_id',$sala_id)->groupBy('fila')->count();
        $sessao = Sessao::where('id',$sessao_id)->first();
        $filas = Lugar::select('fila')->where('sala_id',$sala_id)->distinct()->get();
        $nLugaresTotal = Lugar::where('sala_id',$sala_id)->count();
        $lugaresNaoocupados = $nLugaresTotal - count($bilhetes);
        return view('lugares.index')
                     ->withLugaresFila($nlugaresFila)
                    ->withFilme($filme)
                    ->withBilhetes($bilhetes)
                    ->withFilas($filas)
                    ->withSessao($sessao)
                    ->withLugaresTotal($nLugaresTotal)
                    ->withLugaresNaoOcupados($lugaresNaoocupados);
                    
           
    }
}
