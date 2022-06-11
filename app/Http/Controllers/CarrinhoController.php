<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Sessao;
use App\Models\Sala;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index(Request $request)
    {
        return view('carrinho.index')
            ->with('carrinho', session('carrinho') ?? []);
    }

    public function store(Request $request, Filme $filme,Sessao $sessao)
    {
        $sala = Sala::where('id',$sessao->sala_id)->first();
        $carrinho = $request->session()->get('carrinho', []);
        $carrinho[$filme->id] = [
            'id' => $filme->id,
            'titulo_filme' => $filme->titulo,
            'sessao_id' => $sessao->id,
            'horario_sessao' => $sessao->horario_inicio,
            'sala' => $sala->nome,
            'cartaz_url' => $filme->cartaz_url,
        ];
        $request->session()->put('carrinho', $carrinho);
        return back()
            ->with('alert-msg', 'Foi adicionada um filme "' . $filme->titulo . '" ao carrinho!')
            ->with('alert-type', 'success');
    }
}
