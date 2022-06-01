<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Genero;
use App\Models\Bilhete;
use App\Http\Requests\FilmePost;

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

    public function filmepag(Filme $filme)
    {
        $genero = $filme->genero_code;
        $id = $filme->id;

        $semelhantes = Filme::select('id', 'cartaz_url')
                       ->where('id','!=', $id)
                       ->where('genero_code', $genero)
                       ->get();
    
        return view('filmes.filme')->withFilme($filme)
                                   ->withSemelhantes($semelhantes);
                
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

    public function admin_index(Request $request){
        $qry = Filme::query();
        $genero = $request->genero ?? '';
        if ($genero) {
            $qry->where('genero_code', $genero);
        }
        
        $filmes = $qry->orderBy('ano','desc')->paginate(20);
        $generos = Genero::all();
        
        

        return view('filmes.admin')
            ->withFilmes($filmes)
            ->withGeneros($generos)
            ->withSelectedGenero($genero);;
    }

    public function edit(Filme $filme)
    {
        $generos = Genero::all();
        return view('filmes.edit')
            ->withFilme($filme)
            ->withGeneros($generos);
    }

    public function view(Filme $filme)
    {
        $generos = Genero::all();
        return view('filmes.view')
            ->withFilme($filme)
            ->withGeneros($generos);
    }


    public function create()
    {
        $filme = new Filme();
        $generos = Genero::all();
        return view('filmes.create')
            ->withFilme($filme)
            ->withGeneros($generos);
    }

    public function store(FilmePost $request)
    {
        $newFilme = Filme::create($request->validated());
        if ($request->hasFile('cartaz_url')) {
            $path = $request->foto->store('public/cartazes');
        }
        $newFilme->save();

        return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Filme "' . $newFilme->titulo . '" foi criada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function update(FilmePost $request, Filme $filme)
    {
        $filme->fill($request->validated());
        $filme->save();
        return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Filme "' . $filme->titulo . '" foi alterada com sucesso!')
            ->with('alert-type', 'success');
    }


    public function destroy(Filme $filme)
    {
        $tituloAntigo = $filme->titulo;
        try {
            $filme->delete();
            return redirect()->route('admin.filmes')
                ->with('alert-msg', 'Filme "' . $filme->titulo . '" foi apagada com sucesso!')
                ->with('alert-type', 'success');
        } catch (\Throwable $th) {
            
            if ($th->errorInfo[1] == 1451) {  
                return redirect()->route('admin.filmes')
                    ->with('alert-msg', 'Não foi possível apagar o Filme "' . $tituloAntigo . '", porque este filme já está em uso!')
                    ->with('alert-type', 'danger');
            } else {
                return redirect()->route('admin.filmes')
                    ->with('alert-msg', 'Não foi possível apagar  o Filme "' . $tituloAntigo . '". Erro: ' . $th->errorInfo[2])
                    ->with('alert-type', 'danger');
            }
        }
    }

    public function destroy_foto(Filme $filme)
    {
        Storage::delete('public/cartazes/' . $filme->cataz_url);
        $filme->cataz_url = null;
        $filme->save();
        return redirect()->route('admin.filmes.edit', ['filme' => $filme])
            ->with('alert-msg', 'Foto do filme "' . $filme->cartaz_url . '" foi removida!')
            ->with('alert-type', 'success');
    }


}


