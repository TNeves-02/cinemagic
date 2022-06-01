<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;
use App\Http\Requests\GeneroPost;

class GeneroController extends Controller
{
    public function admin_index(){
        $qry = Genero::query();
      
        $generos = $qry->paginate(20);
        return view('generos.admin')
            ->withGeneros($generos);
    }

    public function edit(Genero $genero)
    {
        return view('generos.edit')
            ->withGenero($genero);
    }

    public function view(Genero $genero)
    {
        return view('generos.view')
            ->withGenero($genero);
    }


    public function create()
    {
        $genero = new Genero();

        return view('generos.create')
            ->withGenero($genero);
    }

    public function store(GeneroPost $request)
    {
        $newGenero= Genero::create($request->validated());
        $newGenero->save();

        return redirect()->route('admin.generos')
            ->with('alert-msg', 'Genero "' . $newGenero->nome . '" foi criado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function update(GeneroPost $request, Genero $genero)
    {
        $genero->fill($request->validated());
        $genero->save();
        return redirect()->route('admin.generos')
            ->with('alert-msg', 'Genero "' . $genero->nome . '" foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }


    public function destroy(Genero $genero)
    {
        $nomeAntigo = $genero->nome;
        try {
            $genero->delete();
            return redirect()->route('admin.generos')
                ->with('alert-msg', 'Genero "' . $genero->nome . '" foi apagado com sucesso!')
                ->with('alert-type', 'success');
        } catch (\Throwable $th) {
            
            if ($th->errorInfo[1] == 1451) {  
                return redirect()->route('admin.generos')
                    ->with('alert-msg', 'Não foi possível apagar o Genero "' . $nomeAntigo . '", porque este genero já está em uso!')
                    ->with('alert-type', 'danger');
            } else {
                return redirect()->route('admin.generos')
                    ->with('alert-msg', 'Não foi possível apagar  o Genero "' . $nomeAntigo . '". Erro: ' . $th->errorInfo[2])
                    ->with('alert-type', 'danger');
            }
        }
    }
}
