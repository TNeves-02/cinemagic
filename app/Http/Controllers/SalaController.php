<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Http\Requests\SalaPost;
use Illuminate\Http\Request;


class SalaController extends Controller
{
    public function admin_index(){
        $qry = Sala::query();
      
        $salas = $qry->paginate(20);
        return view('salas.admin')
            ->withSalas($salas);
    }

    public function edit(Sala $sala)
    {
        return view('salas.edit')
            ->withSala($sala);
    }

    public function view(Sala $sala)
    {
        return view('salas.view')
            ->withSala($sala);
    }


    public function create()
    {
        $sala = new Sala();

        return view('salas.create')
            ->withSala($sala);
    }

    public function store(SalaPost $request)
    {
        $newSala= Sala::create($request->validated());
        $newSala->save();

        return redirect()->route('admin.salas')
            ->with('alert-msg', 'Sala "' . $newSala->nome . '" foi criada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function update(SalaPost $request, Sala $sala)
    {
        $sala->fill($request->validated());
        $sala->save();
        return redirect()->route('admin.salas')
            ->with('alert-msg', 'Sala "' . $sala->nome . '" foi alterada com sucesso!')
            ->with('alert-type', 'success');
    }


    public function destroy(Sala $sala)
    {
        $nomeAntigo = $sala->nome;
        try {
            $sala->delete();
            return redirect()->route('admin.salas')
                ->with('alert-msg', 'Sala "' . $sala->nome . '" foi apagada com sucesso!')
                ->with('alert-type', 'success');
        } catch (\Throwable $th) {
            
            if ($th->errorInfo[1] == 1451) {  
                return redirect()->route('admin.salas')
                    ->with('alert-msg', 'Não foi possível apagar a Sala "' . $nomeAntigo . '", porque esta sala já está em uso!')
                    ->with('alert-type', 'danger');
            } else {
                return redirect()->route('admin.salas')
                    ->with('alert-msg', 'Não foi possível apagar  a Sala "' . $nomeAntigo . '". Erro: ' . $th->errorInfo[2])
                    ->with('alert-type', 'danger');
            }
        }
    }
}
