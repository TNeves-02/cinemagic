<?php

namespace App\Http\Controllers;

use App\Models\Configuracao;
use App\Http\Requests\ConfiguracaoPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfiguracaoController extends Controller
{
    public function admin_index(){
        $configuracao = Configuracao::all();

        return view('configuracao.admin')
            ->withConfiguracao($configuracao);            
    }

    public function edit()
    {
        $configuracao = Configuracao::all();        
        return view('configuracao.edit')
            ->withConfiguracao($configuracao);
    }

    public function update(ConfiguracaoPost $request)
    {
        $configuracao = Configuracao::query()->first();
        $configuracao->fill($request->validated());
        $configuracao->save();
       
        return redirect()->route('admin.configuracao')
            ->with('alert-msg', 'Configuracao foi alterada com sucesso!')
            ->with('alert-type', 'success');
    }

}  
