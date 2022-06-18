<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ config('app.name')}}
    </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link href="{{asset('css/all.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">  

    <script src="{{ asset('js/app.js') }}"></script>    

</head>
<body>
    <div class="row w-100">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5 pb-2">
                        <div class="col-md-6">                        
                        <h3 class="mt-2" style="text-align: center;">Cinemagic</h3>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1" style="text-align: center;">Recibo nº - {{$recibo->id}}</p>
                            <p class="text-muted" style="text-align: center;">Data : {{$recibo->data}}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row pb-3 pt-3 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-3">Imformação do Cliente</p>
                            <p class="mb-1">Nome: {{$recibo->nome_cliente}}</p>                            
                            <p class="mb-1">Email: {{$recibo->cliente->user->email}}</p>                            
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-3">Detalhes de Pagamento</p>                                                    
                            <p class="mb-1"><span class="text-muted">Tipo de Pagamento: </span> {{$recibo->tipo_pagamento}}</p>
                            <p class="mb-1"><span class="text-muted">Referencia de Pagamento: </span> {{$recibo->ref_pagamento}}</p>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Nº de Bilhete</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Nome do Filme</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Lugar</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Preço Sem Iva</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($bilhetes as $bilhete)
                                <tr>
                                        <td>{{$bilhete->id}}</td>
                                        <td>{{$bilhete->sessao->filme->titulo}}</td>
                                        <td>{{$bilhete->lugar_id}}</td>
                                        <td>{{$bilhete->preco_sem_iva}}</td>
                                    </tr>
                                    @endforeach                  
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">                        
                      <br><br>
                    <hr>
                        <br><br>
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Iva&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total</div>
                            <div class="h2 font-weight-light">{{$recibo->iva}}€&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$recibo->preco_total_com_iva}}€</div>
                        </div>                                                                  
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>