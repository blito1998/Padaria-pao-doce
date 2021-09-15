@extends('layouts.main')

@section('title', 'Carrinho')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Produtos que estão no carrinho</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-product-container">
@if(count($productsAsParticipants)>0)
     <table class="table">
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
            @foreach($productsAsParticipants as $product)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td><a href="/cadastro/{{ $product -> id }}">{{$product->product}}</a></td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->qtd}}</td>
                    <td>{{$product->valor}}</td>
                    <td>{{$product->codigo}}</td>
                    <td>
                      <form action="/cadastro/leave/{{$product->id}}" method="POST">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-danger delete-btn">
                          Retirar
                      </button>
                      </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
<p>Não existem produtos no carrinho!</p>
@endif
</div>


@endsection
