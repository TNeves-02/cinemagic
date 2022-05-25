<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;

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
        $filmes = $qry->paginate(8);
        return view('welcome.index')->withFilmes($filmes);

    }
}
