@extends('layout_admin')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Preço Bilhete</th>
            <th>Iva</th>           
            @if(Auth::user()->tipo=="A")               
                <th colspan="1" style="text-align:center;">Ações</th>
            @endif
        </tr>
    </thead>
    <tbody>    
        <tr>    
            <td></td>        
            <td>{{$configuracao[0]->preco_bilhete_sem_iva}} €</td>
            <td>{{$configuracao[0]->percentagem_iva}} %</td>            
                <td class="text-center">
                <a href="{{route('admin.configuracao.edit')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa-solid fa-pen"></i></a>                                                                                        
                </td>                       
            </tr>            
        </tbody>
    </table>
    
@endsection