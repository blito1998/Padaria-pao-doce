@extends('layouts.main')

@section('title', 'Cadastro')

@section('content')
@auth

@if($user->Verificador == 1)
<div class="text-center">
  <a href="/dashboard"  class="btn btn-secondary" id="cadastro-submit">Cadastrar produtos</a>
</div>

<div class="text-center">
  <a href="/cliente/dashboardcliente"  class="btn btn-secondary" id="cadastro-submit">Editar Cliente</a>
</div>


<div class="text-center">
  <a href="/register"  class="btn btn-secondary" id="cadastro-submit">Cadastrar Cliente</a>
</div>
@endif

<div class="text-center">
  <a href="/cadastro/cadastroprodutos"  class="btn btn-secondary" id="cadastro-submit">Cadastrar produtos</a>
</div>

@endauth
@endsection