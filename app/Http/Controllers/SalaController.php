<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Lugar;
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


    public function view(Sala $sala)
    {
        $numColunas = Lugar::select('fila')->where('sala_id',$sala->id)->groupBy('fila')->count();
        $numfilas = Lugar::select('fila')->where('sala_id',$sala->id)->groupBy('posicao')->count();
        return view('salas.view')
            ->withSala($sala)
            ->withNumColunas($numColunas)
            ->withNumFilas($numfilas);
    }


    public function create()
    {
        $sala = new Sala();

        return view('salas.create')
            ->withSala($sala);
    }

    public function store(SalaPost $request)
    {
      
        $newSala= Sala::create( $request->validated());
        $newSala->save();
        

        $filas = $request->filas ?? '';
        $colunas = $request->colunas ?? '';

        $limit = ord('A') + $filas;
        for($letter = ord('A'); $letter < $limit; $letter++){ 
            for ($j=1; $j < $colunas+1; $j++) { 
                $newLugar= Lugar::create([
                    'sala_id' => $newSala->id,
                    'fila' => chr($letter),
                    'posicao' => $j,
                ]);
                $newLugar->save();
            }
        }
       

        return redirect()->route('admin.salas')
            ->with('alert-msg', 'Sala "' . $newSala->nome . '" foi criada com sucesso!')
            ->with('alert-type', 'success');
    }

 
    public function destroy(Sala $sala)
    {
        $nomeAntigo = $sala->nome;
        // $lugares=Lugar::where('sala_id',$sala->id)->delete();
        // dd($lugares,$sala);
        
        try {
            Lugar::where('sala_id',$sala->id)->delete();
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
