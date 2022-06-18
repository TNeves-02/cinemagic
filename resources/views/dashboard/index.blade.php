@extends('layout_admin')
@if(Auth::user()->tipo=="A")
    @section('title','Dashboard' )
@else
    @section('title','Bem Vindo Funcionário' )
@endif
@section('content')

<div class="header-body">
    @if(Auth::user()->tipo=="A")
        <div class="row">
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Receita Total</h5>
                                <span class="h2 font-weight-bold mb-0">{{$total}} €</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                <i class="fa-solid fa-wallet"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Bilhetes Vendidos
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalBilhetes}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                <i class="fa-solid fa-ticket"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Funcionários</h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalFuncionarios}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Sessões</h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalSessoes}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                <i class="fa-solid fa-film"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Pagamento Mais Usado</h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalPagamentoMaisUsado->tipo_pagamento}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                <i class="fa-solid fa-wallet"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Bilhetes Não Usados
                                </h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalBilhetesPorUsar}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                <i class="fa-solid fa-ticket"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Clientes</h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalClientes}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Filmes</h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalFilmes}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                <i class="fa-solid fa-film"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="mt-5 ml-3">Ano {{$ano}}</h3>
        <div class="row mt-4">
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Receita Total</h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalAno}} €</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                <i class="fa-solid fa-wallet"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Funcionários</h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalFuncionariosAno}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Sessões</h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalSessoesAno}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                <i class="fa-solid fa-film"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Pagamento Mais Usado</h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalPagamentoMaisUsado->tipo_pagamento}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                <i class="fa-solid fa-wallet"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Clientes</h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalClientesAno}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 w-100">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Filmes</h5>
                                <span class="h2 font-weight-bold mb-0">{{$totalFilmesAno}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                <i class="fa-solid fa-film"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection