<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Genero;

class FilmeController extends Controller
{
    public function index()
    {
        $qry = Filme::query();
        /*
        if ($curso) {
            $qry->where('curso', $curso);
        }
        */
        $filmes = $qry->paginate(10);
        $generos = Genero::all();

        return view('welcome.index')->withFilmes($filmes)
                                    ->withGeneros($generos);
    }

    public function filmespag()
    {
        $qry = Filme::query();
        /*
        if ($curso) {
            $qry->where('curso', $curso);
        }
        */
        $filmes = $qry->paginate(20);
        $generos = Genero::all();

        return view('filmes.index')->withFilmes($filmes)
                                    ->withGeneros($generos);
    }


}


