
<script src="https://sdk.mercadopago.com/js/v2"></script>

<script>
// Adicione as credenciais do SDK
  const mp = new MercadoPago('TEST-3107f7c6-271a-4fea-b8bd-f227dc7bfd9b', {
        locale: 'es-AR'
  });

  // Inicialize o checkout
  mp.checkout({
      preference: {
          id: '1870176291907586'
      },
      render: {
            container: '.cho-container', // Indique o nome da class onde será exibido o botão de pagamento
            label: 'Pagar', // Muda o texto do botão de pagamento (opcional)
      }
});
</script>

<?php
foreach($users as $user){
  $payer = new MercadoPago\Payer();
  $payer->name = $user->name;
  $payer->email = $user->email;
  $payer->id = $user->id;}
?>
