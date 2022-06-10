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

    public function lugares(Filme $filme , $sessao_id)
    {
        $sala = Sessao::select('sala_id')->where('id',$sessao_id)->first()->sala_id ?? null ;
        $sessao = Sessao::where('id',$sessao_id)->first();
        $nLugaresTotal = Lugar::where('sala_id',$sala)->count();
        $filas = Lugar::select('fila')->where('sala_id',$sala)->distinct()->get();
        $nlugaresFila = Lugar::select('fila')->where('sala_id',$sala)->groupBy('fila')->count();
        $salaFilme = Sala::Where('id',$sala);
        $lugaresOcupados = Bilhete::select('lugares.fila','lugares.posicao')
                ->join('lugares','lugares.id','bilhetes.lugar_id')
                ->where('sessao_id',$sessao_id)
                ->where('estado',"usado")
                ->where('sala_id',$sala)
                ->get();
     
        
        return view('lugares.index')
                     ->withFilme($filme)
                     ->withSessao($sessao)
                     ->withSala($salaFilme)
                     ->withFilas($filas)
                     ->withLugaresOcp($lugaresOcupados)
                     ->withLugaresTotal($nLugaresTotal)
                     ->withLugaresFila($nlugaresFila);
                    
           
    }

}
