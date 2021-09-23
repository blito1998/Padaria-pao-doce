@extends('layouts.main')

@section('title', 'Carrinho')

@section('content')

@csrf
@method('PUT')

<?php

use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;
use App\Models\User;
use App\Models\Product_User;

//Logica de venda
use function PHPSTORM_META\type;

$acess_token = "TEST-1870176291907586-092120-5de678394e7322f727d489629bb8e315-476013376";

require_once 'C:\Users\Edson\Desktop\Versão Final Código\Padaria-pao-doce\sitepadaria\vendor\autoload.php';

    MercadoPago\SDK::setAccessToken($acess_token);

        $valorfinal = 0;

        foreach($productsAsParticipants as $product){
        $preference = new MercadoPago\Preference();

        $item = new MercadoPago\Item();
        $item->id = $product->id;
        $item->title = $product->product;
        $item->description = $product->description;
        $item->quantity = $product->qtd;
        $item->currency_id = "BRL";
        $item->unit_price = $product->valor;

        //Guardar valores da compra
        $valorfinal = $valorfinal + ($item->quantity*$item->unit_price);
        //Temos que colocar os valores do usuário na tabela de vendas por aqui
      
        User::find($user->id)->update([ 'total' => $valorfinal]);
        
        

        
       

        //Valores finais na compra
        $item->quantity = 1;
        $item->unit_price = $valorfinal;
        $item->title = "Produtos do carrinho";

        $preference->items = array($item);

        $preference->back_urls = array(
            "success" => 'http://127.0.0.1:8000/compraconcluida',
            "failure" => 'http://127.0.0.1:8000/cadastro/carrinhocompras', 
            "pending" => 'http://127.0.0.1:8000/'
        );
        $preference->auto_return = "approved"; 

        $preference->notification_url = 'http://localhost:8080/notification.php';
        $preference->external_reference = 4545;
        $preference->save();

        $link = $preference->init_point;
        
        }

      
        
               

        //echo $link;

   
?>

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


    <a href={{$link}} class="btn btn-secondary" >Pagar</a>

@else
<p>Não existem produtos no carrinho!</p>
@endif



</div>


@endsection
