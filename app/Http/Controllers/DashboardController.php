<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Recibo;
use App\Models\Bilhete;
use App\Models\Filme;
use App\Models\Sessao;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ano = date('Y', time());
        $dataInicio = $ano . '-01-01';                     
        $total = Recibo::sum('preco_total_com_iva');            
        $totalBilhetes = Bilhete::count('id');
        $totalBilhetesPorUsar = Bilhete::where('estado','não usado')->count();
        $totalFuncionarios = User::where('tipo','!=','C')->count();
        $totalClientes = User::where('tipo','=','C')->count();
        $totalSessoes = Sessao::count();
        $totalFilmes = Filme::count();
        $pagamentoMaisUsado = Recibo::select('tipo_pagamento',Recibo::raw('COUNT(*)'))->groupBy('tipo_pagamento')->orderByDesc('tipo_pagamento')->first();            

        $totalAno = Recibo::whereBetween('data', [$dataInicio, date('Y-m-d',time())])->sum('preco_total_com_iva');            
        $totalFuncionariosAno = User::where('tipo','!=','C')->whereBetween('created_at', [$dataInicio, date('Y-m-d',time())])->count();
        $totalClientesAno = User::where('tipo','=','C')->whereBetween('created_at', [$dataInicio, date('Y-m-d',time())])->count();
        $totalSessoesAno = Sessao::whereBetween('data', [$dataInicio, date('Y-m-d',time())])->count();
        $totalFilmesAno = Filme::whereBetween('created_at', [$dataInicio, date('Y-m-d',time())])->count();
        $pagamentoMaisUsadoAno = Recibo::select('tipo_pagamento',Recibo::raw('COUNT(*)'))->whereBetween('created_at', [$dataInicio, date('Y-m-d',time())])->groupBy('tipo_pagamento')->orderByDesc('tipo_pagamento')->first();  

        return view('dashboard.index')
                ->withAno($ano)
                ->withTotal($total)                
                ->withTotalBilhetes($totalBilhetes)
                ->withTotalBilhetesPorUsar($totalBilhetesPorUsar)
                ->withTotalFuncionarios($totalFuncionarios)
                ->withTotalClientes($totalClientes)
                ->withTotalSessoes($totalSessoes)
                ->withTotalFilmes($totalFilmes)
                ->withTotalPagamentoMaisUsado($pagamentoMaisUsado)     
                ->withTotalAno($totalAno)                               
                ->withTotalFuncionariosAno($totalFuncionariosAno)
                ->withTotalClientesAno($totalClientesAno)
                ->withTotalSessoesAno($totalSessoesAno)
                ->withTotalFilmesAno($totalFilmesAno)
                ->withTotalPagamentoMaisUsadoAno($pagamentoMaisUsadoAno);
    }
}
