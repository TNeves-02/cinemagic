<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Sala;
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

}
