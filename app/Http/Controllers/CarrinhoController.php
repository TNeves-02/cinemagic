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

    public function store_compra(Request $request, Filme $filme,Sessao $sessao)
    {
        
        $sala = Sala::where('id',$sessao->sala_id)->first();
        $carrinho = $request->session()->get('carrinho', []);
        $carrinho[$sessao->id] = [
            'id' => $sessao->id,
            'titulo_filme' => $filme->titulo,
            'sessao_id' => $sessao->id,
            'horario_sessao' => $sessao->horario_inicio,
            'sala' => $sala->nome,
            'lugares' => $request->lugar,
        ];
        $request->session()->put('carrinho', $carrinho);
        return back()
            ->with('alert-msg', 'Foi adicionada uma sessao "' . $sessao->id . '" ao carrinho!')
            ->with('alert-type', 'success');
    }

    public function destroy_carrinho_linha(Request $request,Sessao $sessao)
    {
        $carrinho = $request->session()->get('carrinho', []);
        if (array_key_exists($sessao->id, $carrinho)) {
            unset($carrinho[$sessao->id]);
            $request->session()->put('carrinho', $carrinho);
            return back()
                ->with('alert-msg', 'Removeu uma linha do carrinho de compras')
                ->with('alert-type', 'success');
        }
        return back()
            ->with('alert-msg', 'A Sessao "' . $sessao->id . '" já não estava no carrinho!')
            ->with('alert-type', 'warning');
    }

    public function destroy(Request $request)
    {
        $request->session()->forget('carrinho');
        return back()
            ->with('alert-msg', 'Carrinho foi limpo!')
            ->with('alert-type', 'danger');
    }

    public function store_carrinho(Request $request)
    {
        dd(
            'Place code to store the shopping cart / transform the cart into a sale',
            $request->session()->get('carrinho')
        );
    }
}
