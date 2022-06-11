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
        $dataFim = $ano . '-12-31';
        $total = Recibo::sum('preco_total_com_iva');
        $totalAno = Recibo::where('data', '>=', $dataInicio)
                        ->where('data', '<=', $dataFim)
                        ->sum('preco_total_com_iva');
        $totalBilhetes = Bilhete::count('id');
        $totalBilhetesPorUsar = Bilhete::where('estado','não usado')->count();
        $totalFuncionarios = User::where('tipo','!=','C')->count();
        $totalClientes = User::where('tipo','=','C')->count();
        $totalSessoes = Sessao::count();
        $totalFilmes = Filme::count();

        return view('dashboard.index')
                ->withTotal($total)
                ->withTotalAno($totalAno)
                ->withTotalBilhetes($totalBilhetes)
                ->withTotalBilhetesPorUsar($totalBilhetesPorUsar)
                ->withTotalFuncionarios($totalFuncionarios)
                ->withTotalClientes($totalClientes)
                ->withTotalSessoes($totalSessoes)
                ->withTotalFilmes($totalFilmes);
    }
}
