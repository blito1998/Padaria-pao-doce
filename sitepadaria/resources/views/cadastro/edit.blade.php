@extends('layouts.main')

@section('title', 'Editar')

@section('content')

<div id="product-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{$product->product}}</h1>
    <form action="/cadastro/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
         <label for="image">Imagem do Produto:</label>
         <input type="file" id="image" name="image" class="from-control-file">
         <img src="/img/products/{{$product->image}}" alt="{{$product->product}}" class="img-preview">
        </div>
        <div class="form-group">
         <label for="product">Produto:</label>
         <input type="text" class="form-control" id="product" name="product" placeholder="Nome do produto" value="{{$product->product}}">
        </div>
        <div class="form-group">
         <label for="description">Descrição do produto:</label>
         <input type="text" class="form-control" id="description" name="description" placeholder="Descrição do produto" value="{{$product->description}}" >
        </div>
        <div class="form-group">
         <label for="qtd">Quantidade do produto:</label>
         <input type="text" class="form-control" id="qtd" name="qtd" placeholder="Quantidade do produto" value="{{$product->qtd}}">
        </div>
        <div class="form-group">
         <label for="valor">Valor do produto:</label>
         <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor do produto" value="{{$product->valor}}">
        </div>
        <div class="form-group">
         <label for="codigo">Código do produto:</label>
         <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo do produto" value="{{$product->codigo}}">
        </div>
        <input type="submit" class="btn btn-secondary" value="Confirmar">
    </form>
</div>

@endsection