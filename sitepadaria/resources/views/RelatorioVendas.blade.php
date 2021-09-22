@extends('layouts.main')

@section('title', 'dashboard')

@section('content')

<div class="col-md-12 dashboard-product-container">
    <div class="row">
    <div class="col-md-2 text-center">

        </div>
        <div class="col-md-10">
            @if(count($vendas)>0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Valor da compra</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($vendas as $venda)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{$users[$venda->user_id - 1]->name}}</td>
                            <td>{{$venda->total}}</td>
                   

                    @endforeach
                </tbody>
            </table>
            @else
            <p>Não há vendas cadastradas, <a href="/">voltar para pagina inicial</a></p>
            @endif
        </div>
    </div>
</div>






@endsection
