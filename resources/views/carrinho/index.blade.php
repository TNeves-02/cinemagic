@extends('layout')

@section('content')
<section class="vh-100 mt-5">
    <div class="container py-5 h-100 mt-5 ml-5 pr-5 mw-100">
        <div class="row d-flex justify-content-center align-items-center h-100 w-100">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card bg-white text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-2 mt-md-2 pb-2">
                            <h1>Carrinho</h1>
                            <hr class="mt-4 mb-4">
                            <table class="table table-striped table-dark text-light align-middle">
                                <thead class="text-light">
                                    <tr>
                                        <th>Titulo Filme</th>
                                        <th>Sala</th>
                                        <th>Sessao</th>
                                        <th>Hora Inicio</th>
                                        <th>Lugares Escolhidos</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carrinho as $row)
                                    <tr>
                                        <td>{{ $row['titulo_filme'] }} </td>
                                        <td>{{ $row['sala'] }} </td>
                                        <td>{{ $row['id'] }} </td>
                                        <td>{{ $row['horario_sessao'] }} </td>
                                        <td>
                                            @foreach ($row['lugares'] as $lugar)
                                            {{ $lugar }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <form action="{{route('carrinho.destroy_linha', $row['id'])}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input class="btn btn-outline-light" type="submit" value="Remover">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <p>
                                <form action="{{route('carrinho.destroy')}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <input class="btn btn-dark btn-lg " type="submit" value="Apagar carrinho">
                                </form>
                                </p>
                                <p >
                                <form action="{{route('carrinho.store.carrinho')}}" method="POST">
                                    @csrf
                                    <input class="btn btn-dark btn-lg " type="submit" value="Confirmar carrinho">
                                </form>
                                </p>
                            </div>
                            <hr class="mt-4 mb-4">
                            <a class="btn btn-outline-dark btn-lg mt-2" href="{{ route('welcome.index') }}"><i class="fa-solid fa-arrow-left"></i>
                                {{ __('Página inicial') }}
                            </a>
                            <a class="btn btn-outline-dark btn-lg mt-2" href="{{ url()->previous() }}"><i class="fa-solid fa-rotate-left"></i>
                                {{ __('Voltar') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection