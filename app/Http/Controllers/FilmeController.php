<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Genero;
use App\Models\Bilhete;

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
        $ultLancamentos = Filme::orderBy('ano', 'desc')->take(3)->get();                                  

        return view('welcome.index')->withFilmes($filmes)
                                    ->withGeneros($generos)
                                    ->withUltLancamentos($ultLancamentos);
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
        
        $ano = Filme::select('ano')->distinct()->orderBy('ano', 'desc')->get(); 
      
        return view('filmes.index')->withFilmes($filmes)
                                   ->withGeneros($generos)
                                   ->withAnos($ano);
                
    }

    public function filmepag()
    {
        $qry = Filme::query();
        /*
        if ($curso) {
            $qry->where('curso', $curso);
        }
        */
        $filmes = $qry->paginate(20);
        $generos = Genero::all();
        
        $ano = Filme::select('ano')->distinct()->orderBy('ano', 'desc')->get(); 
      
        return view('filmes.filme')->withFilmes($filmes)
                                   ->withGeneros($generos)
                                   ->withAnos($ano);
                
    }

    public function bilhete()
    {
        $qry = Filme::query();
        /*
        if ($curso) {
            $qry->where('curso', $curso);
        }
        */
        $filmes = $qry->paginate(20);
        $generos = Genero::all();
        $ultLancamentos = Filme::orderBy('ano', 'desc')->take(3)->get(); 
        $ano = Filme::select('ano')->distinct()->orderBy('ano', 'desc')->get(); 
      
        return view('bilhetes.index')->withFilmes($filmes)
                                   ->withGeneros($generos)                                
                                   ->withAnos($ano);
                
    }


}


