<?php
// SDK do Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Adicione as credenciais
MercadoPago\SDK::setAccessToken('TEST-1870176291907586-092120-5de678394e7322f727d489629bb8e315-476013376');
?>

// Cria um objeto de preferência
$preference = new MercadoPago\Preference();

// Cria um item na preferência

$item = new MercadoPago\Item();
$item->title = $product->product;
$item->quantity = $product->qnt;
$item->unit_price = $product->valor;
$preference->items = array($item);
$preference->save();




?>
