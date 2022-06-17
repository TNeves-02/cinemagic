<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Sessao;
use App\Models\Sala;
use App\Models\Configuracao;
use App\Services\Payment;
use App\Models\Recibo;
use App\Models\Bilhete;
use App\Models\Lugar;
use App\Notifications\FaturaPaga;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

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
            'horario_sessao' => $sessao->horario_inicio,
            'sala' => $sala->nome,
            'sala_id' => $sala->id,
            'lugares' => $request->lugar,
        ];
       
        $request->session()->put('carrinho', $carrinho);
        return redirect()->route('carrinho.index');
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
        $carrinho = $request->session()->get('carrinho');
        $preco_bilhete = Configuracao::first();
        $nlugares = 0;
        foreach ($carrinho as $row ) {
            $nlugares = $nlugares + count($row['lugares']);
        }
        $totalPagarSemIva = number_format($nlugares * $preco_bilhete->preco_bilhete_sem_iva,2);
        $totalPagarComIva = number_format( $nlugares * ($preco_bilhete->preco_bilhete_sem_iva+($preco_bilhete->preco_bilhete_sem_iva*($preco_bilhete->percentagem_iva/100))),2);

        $iva =number_format( ($preco_bilhete->percentagem_iva/100) *$totalPagarSemIva , 2) ;
        
       
        return view('carrinho.pagamento')
                 -> withIva($iva)
                 -> withtotalPagarSemIva($totalPagarSemIva)
                 -> withtotalPagarComIva($totalPagarComIva)
                 -> withCarrinho($carrinho);
    }

    public function finalizar(Request $request)
    {
        $pagamento = $request->pagamento ?? '';

        $carrinho = $request->session()->get('carrinho');

        $preco_bilhete = Configuracao::first();

        $nlugares = 0;
        foreach ($carrinho as $row ) {
            $nlugares = $nlugares + count($row['lugares']);
        }
        
        $totalPagarSemIva = number_format($nlugares * $preco_bilhete->preco_bilhete_sem_iva,2);
        $totalPagarComIva = number_format( $nlugares * ($preco_bilhete->preco_bilhete_sem_iva+($preco_bilhete->preco_bilhete_sem_iva*($preco_bilhete->percentagem_iva/100))),2);

        $iva =number_format( ($preco_bilhete->percentagem_iva/100) *$totalPagarSemIva , 2) ;
        
        return view('pagamento.finalizar')
                 -> withIva($iva)
                 -> withtotalPagarSemIva($totalPagarSemIva)
                 -> withtotalPagarComIva($totalPagarComIva)
                 -> withPagamento($pagamento);
    }

    public function recibo(Request $request)
    {
        $carrinho = $request->session()->get('carrinho');

        $preco_bilhete = Configuracao::first();

        $nlugares = 0;
        
        foreach ($carrinho as $row ) {
            $nlugares = $nlugares + count($row['lugares']);
        }
        
        $totalPagarSemIva = number_format($nlugares * $preco_bilhete->preco_bilhete_sem_iva,2);
        $totalPagarComIva = number_format( $nlugares * ($preco_bilhete->preco_bilhete_sem_iva+($preco_bilhete->preco_bilhete_sem_iva*($preco_bilhete->percentagem_iva/100))),2);

        $iva =number_format( ($preco_bilhete->percentagem_iva/100) *$totalPagarSemIva , 2) ;
        
        $pagamento = $request->pagamento ?? '';

        if ($pagamento == "VISA") {
            $nCartao = $request->NCartao ?? '';
            $codCVC = $request->codCVC ?? '';
            if(Payment::payWithVisa($nCartao,$codCVC)){
                

                $newRecibo = Recibo::create([
                    'cliente_id' => Auth::user()->cliente->id,
                    'data' => date('Y-m-d', time()) , 
                    'preco_total_sem_iva' => $totalPagarSemIva, 
                    'iva'=> $iva , 
                    'preco_total_com_iva' =>  $totalPagarComIva,
                    'nif' => Auth::user()->cliente->nif ,
                    'nome_cliente' => Auth::user()->name,
                    'tipo_pagamento' => $pagamento,
                    'ref_pagamento' => $nCartao,
                    'recibo_pdf_url' => null,
                ]);


               $newRecibo->save();
                foreach ($carrinho as $row ) {
                 foreach ($row['lugares'] as $lugar) {
                    $idLugar = Lugar::where([['sala_id', $row['sala_id']],['fila',$lugar[0]],['posicao',$lugar[1]]])
                                   ->get();
                    $newBilhete = Bilhete::create([
                        'recibo_id'=> $newRecibo->id,
                        'cliente_id' => Auth::user()->cliente->id,
                        'sessao_id' => $row['id'],
                        'lugar_id' => $idLugar[0]->id,
                        'preco_sem_iva' => $preco_bilhete->preco_bilhete_sem_iva ,
                        'estado' => "não usado",
                    ]);
                    $newBilhete->save();
                 }
                }
                
               $request->session()->forget('carrinho');
               Auth::user()->notify(new FaturaPaga($newRecibo));
               return redirect()->route('welcome.index');
            }
            else{
                return back()->withErrors(['msg' => 'Escreva números válidos!']);
            }
        }

       elseif($pagamento == "PAYPAL") {   
            $email = $request->email ?? '';
            if( Payment::payWithPaypal($email)){
                               
                $newRecibo = Recibo::create([
                    'cliente_id' => Auth::user()->cliente->id,
                    'data' => date('Y-m-d', time()) , 
                    'preco_total_sem_iva' => $totalPagarSemIva, 
                    'iva'=> $iva , 
                    'preco_total_com_iva' =>  $totalPagarComIva,
                    'nif' => Auth::user()->cliente->nif ,
                    'nome_cliente' => Auth::user()->name,
                    'tipo_pagamento' => $pagamento,
                    'ref_pagamento' => $email,
                    'recibo_pdf_url' => null,
                ]);
               
                $newRecibo->save();
                foreach ($carrinho as $row ) {
                 foreach ($row['lugares'] as $lugar) {
                    $idLugar = Lugar::where([['sala_id', $row['sala_id']],['fila',$lugar[0]],['posicao',$lugar[1]]])
                                   ->get();
                    $newBilhete = Bilhete::create([
                        'recibo_id'=> $newRecibo->id,
                        'cliente_id' => Auth::user()->cliente->id,
                        'sessao_id' => $row['id'],
                        'lugar_id' => $idLugar[0]->id,
                        'preco_sem_iva' => $preco_bilhete->preco_bilhete_sem_iva ,
                        'estado' => "não usado",
                    ]);
                    $newBilhete->save();
                 }
                }
                $request->session()->forget('carrinho');
                Auth::user()->notify(new FaturaPaga($newRecibo));
                return redirect()->route('welcome.index');
            }
            else{
                return back()->withErrors(['msg' => 'Escreva um Email válido!']);
            }
        }

        elseif($pagamento == "MBWAY") {
            $nTelefone = $request->nTelefone ?? '';
            if(Payment::payWithMBway($nTelefone)){
                $newRecibo = Recibo::create([
                    'cliente_id' => Auth::user()->cliente->id,
                    'data' => date('Y-m-d', time()) , 
                    'preco_total_sem_iva' => $totalPagarSemIva, 
                    'iva'=> $iva , 
                    'preco_total_com_iva' =>  $totalPagarComIva,
                    'nif' => Auth::user()->cliente->nif ,
                    'nome_cliente' => Auth::user()->name,
                    'tipo_pagamento' => $pagamento,
                    'ref_pagamento' => $nTelefone,
                    'recibo_pdf_url' => null,
                ]);
               
                $newRecibo->save();
                foreach ($carrinho as $row ) {
                 foreach ($row['lugares'] as $lugar) {
                    $idLugar = Lugar::where([['sala_id', $row['sala_id']],['fila',$lugar[0]],['posicao',$lugar[1]]])
                                   ->get();
                    $newBilhete = Bilhete::create([
                        'recibo_id'=> $newRecibo->id,
                        'cliente_id' => Auth::user()->cliente->id,
                        'sessao_id' => $row['id'],
                        'lugar_id' => $idLugar[0]->id,
                        'preco_sem_iva' => $preco_bilhete->preco_bilhete_sem_iva ,
                        'estado' => "não usado",
                    ]);
                    $newBilhete->save();
                 }
                }
                $request->session()->forget('carrinho');

                Auth::user()->notify(new FaturaPaga($newRecibo));

                return redirect()->route('welcome.index');
            }
            else{
                return back()->withErrors(['msg' => 'Escreva um número de telefone válido!']);
            }
        }
       
    }



}
