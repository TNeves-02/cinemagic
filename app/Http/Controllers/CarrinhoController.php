<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Sessao;
use App\Models\Sala;
use App\Models\Configuracao;
use App\Services\Payment;
use App\Models\Recibo;
use Auth;
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
            $validacao = Payment::payWithVisa($nCartao,$codCVC);
            if($validacao){
                //cria um recibo e cria os bilhetes e volta para a pagina inicial 
                //limpar o carrinho
                $recibo = array(Auth::user()->cliente->id,date('Y-m-d', time()),$totalPagarSemIva,$iva, $totalPagarComIva,Auth::user()->cliente->nif,Auth::user()->name,$pagamento,$nCartao);
             
                $newRecibo = Recibo::create($recibo);
                //atualizar tabela cliente
                //criar bilhetes
                $request->session()->forget('carrinho');

            }
            else{
                return back()->withErrors(['msg' => 'Escreva números válidos!']);
            }
        }

       elseif($pagamento == "PAYPAL") {   
            $email = $request->email ?? '';
            $validacao = Payment::payWithPaypal($email);
            if($validacao){
                //ria um recibo e cria os bilhetes e volta para a pagina inicial 
            }
            else{
                return back()->withErrors(['msg' => 'Escreva um Email válido!']);
            }
        }

        elseif($pagamento == "MBWAY") {
            $nTelefone = $request->nTelefone ?? '';
            $validacao = Payment::payWithMBway($nTelefone);
            if($validacao){
                //ria um recibo e cria os bilhetes e volta para a pagina inicial 
            }
            else{
                return back()->withErrors(['msg' => 'Escreva um número de telefone válido!']);
            }
        }
       
    }



}
