@extends('layouts.main')

@section('title', 'dashboard')

@section('content')

<div class="col-md-12 dashboard-product-container">
    <div class="row">
    <div class="col-md-2 text-center">
        </div>
        <div class="col-md-10">
            @if(count($products)>0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Código</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td><a href="/cadastro/{{ $product -> id }}">{{$product->product}}</a></td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->qtd}}</td>
                            <td>{{$product->valor}}</td>
                            <td>{{$product->codigo}}</td>
                            <td>



                               
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>Não há produtos cadastrados, <a href="/cadastro/cadastroprodutos">Adicionar produto</a></p>
            @endif
        </div>
    </div>
</div>

@endsection