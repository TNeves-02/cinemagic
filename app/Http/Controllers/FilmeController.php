<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Genero;
use App\Models\Bilhete;
use App\Models\Sessao;
use App\Http\Requests\FilmePost;

class FilmeController extends Controller
{
    public function index()
    {
        $qry = Filme::query();
        $filmes = $qry->paginate(10);
        $generos = Genero::all();
        $ultLancamentos = Filme::orderBy('ano', 'desc')->take(3)->get();
        $maisVistos = Filme::select('filmes.id','filmes.cartaz_url',Filme::raw('COUNT(*) as conta'))
                        ->join('sessoes', 'filmes.id', '=', 'sessoes.filme_id')
                        ->groupBy('filmes.id')
                        ->groupBy('filmes.cartaz_url')
                        ->orderByDesc('conta')
                        ->take(3)
                        ->get();                                                   

        $proximasSessoes = Filme::select('filmes.*','sessoes.id as sessionId','salas.nome','sessoes.horario_inicio','sessoes.data')
                            ->join('sessoes', 'filmes.id', '=', 'sessoes.filme_id')
                            ->join('salas', 'salas.id', '=', 'sessoes.sala_id')
                            ->where('sessoes.data', '>=', date('Y-m-d', time()))
                            ->where('sessoes.horario_inicio', '>=', date('H:i:s', time()))
                            ->orderBy('sessoes.data','asc')
                            ->orderBy('sessoes.horario_inicio','asc')
                            ->take(25)
                            ->get();

        return view('welcome.index')->withFilmes($filmes)
                                    ->withGeneros($generos)
                                    ->withUltLancamentos($ultLancamentos)
                                    ->withMaisVistos($maisVistos)
                                    ->withProximasSessoes($proximasSessoes);
    }

    public function filmespag( Request $request )
    {
        $qry = Filme::query();
        $genero = $request->genero ?? '';
        if ($genero) {
            $qry->where('genero_code', $genero);
        }
        $titulo = $request->titulo ?? '';
        if ($titulo) {
            $qry->where('titulo','LIKE', '%' . $titulo . '%');
        }

        $ano = $request->ano ?? '';
        if ($ano) {
            $qry->where('ano', $ano);
        }
        
       $sessao = ' ';
        $sessoes = $request->sessoes ?? '';
        if ($sessoes == 1) {
            $id_filme = Sessao::Select('filme_id')->where([['data','=',date('Y-m-d', time())],['horario_inicio','>=', date('H:i:s', time())]])
                                                  ->Orwhere('data','>',date('Y-m-d', time()))                           
                                                  ->distinct()->get();
            for ($i=0; $i < count($id_filme) ; $i++) { 
                $qry->Orwhere('id', $id_filme[$i]->filme_id);
            }
            $sessao = 1;
        }
        elseif ($sessoes == 0) {
            $id_filme = Sessao::Select('filme_id')->where([['data','=',date('Y-m-d', time())],['horario_inicio','<', date('H:i:s', time())]])
                                                  ->Orwhere('data','<',date('Y-m-d', time()))                           
                                                 ->distinct()->get();
            for ($i=0; $i < count($id_filme) ; $i++) { 
                     $qry->Orwhere('id', $id_filme[$i]->filme_id);
            }
            $sessao = 0;
        }

        $filmes = $qry->paginate(20);

        $generos = Genero::all();

        $anos = Filme::select('ano')->distinct()->orderBy('ano', 'desc')->get(); 
  
        return view('filmes.index')->withFilmes($filmes)
                                   ->withGeneros($generos)
                                   ->withSelectedGenero($genero)
                                   ->withSelectedAno($ano)
                                   ->withSelectedSessao($sessao)
                                   ->withAnos($anos);
                
    }

    public function filmepag(Filme $filme, Request $request)
    {
        $data = $request->data ?? '';
        $qry = Sessao::query();
        if ($data) {
            $qry->where('data', $data);
        }

        $semelhantes = Filme::select('id', 'cartaz_url')->where('id','!=', $filme->id)
                                                ->where('genero_code', $filme->genero_code)
                                                ->get();

        if(!$data){ //nao existe data passada no url 
        $sessoes = Filme::select('sessoes.id','salas.nome','sessoes.horario_inicio','sessoes.data')
                                           ->join('sessoes', 'filmes.id', '=', 'sessoes.filme_id')
                                           ->join('salas', 'salas.id', '=', 'sessoes.sala_id')
                                           ->where('filmes.id','=',$filme->id)
                                           ->where('sessoes.data', '=', date('Y-m-d', time()))
                                           ->where('sessoes.horario_inicio', '>=', date('H:i:s', time()))
                                           ->orWhere([['sessoes.data','>', date('Y-m-d', time())],['filmes.id','=',$filme->id]])
                                           ->orderBy('sessoes.data','asc')
                                           ->orderBy('sessoes.horario_inicio','asc')
                                           ->get();
        }
        else{ //existe data passada no url
            $sessoes = Filme::select('sessoes.id','salas.nome','sessoes.horario_inicio','sessoes.data')
                                 ->join('sessoes', 'filmes.id', '=', 'sessoes.filme_id')
                                 ->join('salas', 'salas.id', '=', 'sessoes.sala_id')
                                 ->where('filmes.id','=',$filme->id)
                                 ->where('sessoes.data', '=', $data)
                                 ->where('sessoes.horario_inicio', '>=', $data==date('Y-m-d', time()) ? date('H:i:s', time()) : '00:00:00')
                                 ->orderBy('sessoes.data','asc')
                                 ->orderBy('sessoes.horario_inicio','asc')
                                 ->get();
            }    
            
            $datas = Filme::select('sessoes.data')
                             ->join('sessoes', 'filmes.id', '=', 'sessoes.filme_id')
                             ->where([['sessoes.data', '=', date('Y-m-d', time())],['sessoes.horario_inicio', '>=', date('H:i:s', time())],['filmes.id','=',$filme->id]])
                             ->orWhere([['sessoes.data', '>', date('Y-m-d', time())],['filmes.id','=',$filme->id]])
                             ->orderBy('sessoes.data','asc')
                             ->distinct()
                             ->get();
                         
        return view('filmes.filme')->withFilme($filme)
                           ->withSemelhantes($semelhantes)
                           ->withDatas($datas)
                           ->withSelectedData($data)
                           ->withSessoes($sessoes);

       
    }

    public function bilhete()
    {
        $qry = Filme::query();
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
            $path = $request->cartaz_url->store('public/cartazes');
            $newFilme->cartaz_url = basename($path);
        }
        $newFilme->save();

        return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Filme "' . $newFilme->titulo . '" foi criado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function update(FilmePost $request, Filme $filme)
    {
        $filme->fill($request->validated());
        $filme->save();
        return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Filme "' . $filme->titulo . '" foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }


    public function destroy(Filme $filme)
    {
        $tituloAntigo = $filme->titulo;
        try {
            $filme->delete();
            return redirect()->route('admin.filmes')
                ->with('alert-msg', 'Filme "' . $filme->titulo . '" foi apagado com sucesso!')
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


