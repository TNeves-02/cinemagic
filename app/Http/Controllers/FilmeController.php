<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;

class FilmeController extends Controller
{
    public function index()
    {
        $listaFilmes = Filme::all(); //lista de todos os filmes
        dd($listaFilmes); //apagar

    }
}
