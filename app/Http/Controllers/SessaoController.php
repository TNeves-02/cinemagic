<?php


namespace App\Http\Controllers;

use App\Models\Sessao;
use App\Models\Filme;
use App\Models\Sala;
use App\Http\Requests\SessaoPost;
use Illuminate\Http\Request;

class SessaoController extends Controller
{
    public function admin_index(Request $request){
        
        $qry = Sessao::query();
        
        $data = $request->data ?? '';
        if ($data) {
            $qry->where('data', $data);
        }
        $horario_inicio = $request->horario_inicio?? '';
        if ($horario_inicio) {
            $qry->where('horario_inicio', $horario_inicio);
        }
        $filme = $request->filme?? '';
        if ($filme) {
            $qry->where('filme_id', $filme);
        }
        $filmes = Filme::all(); 

        $sala = $request->sala?? '';
        if ($sala) {
            $qry->where('sala_id', $sala);
        }
        $salas = Sala::all(); 

        $sessoes = $qry->paginate(20);
        return view('sessoes.admin')
             ->withSelectedData($data)
             ->withSelectedHora($horario_inicio)
             ->withSelectedFilme($filme)
             ->withFilmes($filmes)
             ->withSelectedSala($sala)
             ->withSalas($salas)
            ->withSessoes($sessoes);
    }
    
    public function create()
    {
        $sessao = new Sessao();
        $filmes = Filme::all();
        $salas = Sala::all();
        return view('sessoes.create')
            ->withSessao($sessao)
            ->withFilmes($filmes)
            ->withSalas($salas);
    }

    public function store(SessaoPost $request)
    {
        $newSessao= Sessao::create($request->validated());
        $newSessao->save();

        return redirect()->route('admin.sessoes')
            ->with('alert-msg', 'Sessao "' . $newSessao->id . '" foi criada com sucesso!')
            ->with('alert-type', 'success');
    }

    


    public function edit(Sessao $sessao)
    {
        $filmes = Filme::all();
        $salas = Sala::all();
        return view('sessoes.edit')
            ->withSessao($sessao)
            ->withFilmes($filmes)
            ->withSalas($salas);
    }


      

    public function update(SessaoPost $request, Sessao $sessao)
    {
        $sessao->fill($request->validated());
        $sessao->save();
        return redirect()->route('admin.sessoes')
            ->with('alert-msg', 'Sessao "' . $sessao->id . '" foi alterada com sucesso!')
            ->with('alert-type', 'success');
    }







    public function view(Sessao $sessao)
    {
        $filmes = Filme::all();
        $salas = Sala::all();
        return view('sessoes.view')
            ->withSessao($sessao)
            ->withFilmes($filmes)
            ->withSalas($salas);
    }

    

   

    public function destroy(Sessao $sessao)
    {
        $idAntigo = $sessao->id;
        try {
            $sessao->delete();
            return redirect()->route('admin.sessoes')
                ->with('alert-msg', 'Sala "' . $sessao->id. '" foi apagada com sucesso!')
                ->with('alert-type', 'success');
        } catch (\Throwable $th) {
            
            if ($th->errorInfo[1] == 1451) {  
                return redirect()->route('admin.sessoes')
                    ->with('alert-msg', 'Não foi possível apagar a Sala "' . $idAntigo . '", porque esta sala já está em uso!')
                    ->with('alert-type', 'danger');
            } else {
                return redirect()->route('admin.sessoes')
                    ->with('alert-msg', 'Não foi possível apagar  a Sala "' . $idAntigo . '". Erro: ' . $th->errorInfo[2])
                    ->with('alert-type', 'danger');
            }
        }
    }
}
