@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div id="search-container" class="col-md-12">
    
</div>

<div id="products-container" class="col-md-12">
    <h2>Produtos</h2>
    <div id="cards-container" class="row">
        @foreach($products as $product)
        <div class="card col-md-3">
            <img src="/img/products/{{$product->image}}" alt="{{$product->title}}">
            <div class="card-body">
                <h5 class="card-title"> {{$product->product}} </h5>
                <a href="/cadastro/{{$product->id}}" class="btn btn-secondary">Comprar</a>
            </div>
        </div>
        @endforeach
        @if (count($products) == 0 && $search)
        <p>Não foi possível encontrar esse produto: {{$search}}! <a href="/">Ver todos</a></p>
        @elseif (count($products)==0)
        <p>Não há produtos disponíveis</p>
        @endif
    </div>

   
    @auth

    @if($user->Verificador == 1 )
        <a href="/cadastro" class="btn btn-secondary">Cadastrar</a>  
    @endif

    @if($user->Verificador == 2 )
        <a href="/cadastro" class="btn btn-secondary">Cadastrar</a>  
    @endif
  
  

  

    @endauth
    
       


</div>

@endsection