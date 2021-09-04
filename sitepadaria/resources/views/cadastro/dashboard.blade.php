@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Produtos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-product-container">
    @if(count($products)>0)
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
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td><a href="/cadastro/{{ $product -> id }}">{{$product->product}}</a></td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->qtd}}</td>
                    <td>{{$product->valor}}</td>
                    <td>{{$product->codigo}}</td>
                    <td>
                        <a href="/cadastro/edit/{{$product->id}}" class="btn btn-info edit btn">Editar</a> 

                        <form action="/cadastro/{{$product->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn"> DELETAR</button>
                        </form>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Não há produtos cadastrados, <a href="/cadastro/cadastroprodutos">Adicionar produto</a></p>
    @endif
</div>
<div class="text-center">
  <a href="/cadastro/cadastroprodutos"  class="btn btn-secondary" id="cadastro-submit">Cadastrar produtos</a>
</div>

@endsection
