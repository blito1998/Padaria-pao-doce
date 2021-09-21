<?php  

$acess_token = "TEST-1870176291907586-092120-5de678394e7322f727d489629bb8e315-476013376";

require_once 'C:\Users\Edson\Desktop\Versão Final Código\Padaria-pao-doce\sitepadaria\vendor\autoload.php';

MercadoPago\SDK::setAccessToken($acess_token);

        foreach($productsAsParticipants as $product){
        $preference = new MercadoPago\Preference();

        $item = new MercadoPago\Item();
        $item->id = $product->id;
        $item->title = $product->product;
        $item->description = $product->description;
        $item->quantity = $product->qtd;
        $item->currency_id = "BRL";
        $item->unit_price = $product->valor;

        $preference->items = array($item);

        $preference->back_urls = array(
            "success" => 'http://localhost:8080/sucess',
            "failure" => 'http://localhost:8080/failure', 
            "pending" => 'http://localhost:8080/pending'
        );
        $preference->auto_return = "approved"; 

        $preference->notification_url = 'http://localhost:8080/notification.php';
        $preference->external_reference = 4545;
        $preference->save();

        
        $link = $preference->init_point;
        echo $link;

        }
        
        
?>