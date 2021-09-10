@extends('layouts.main')

@section('title', $user->name)

@section('content')

<div class="col-md-10 offset-md-1">
  <div class="row">
    <div id="info-container" class="col-md-6">
      <h1>{{$user->name}}</h1>
      <p class="user-email">Email: {{$user->email}}</p>
      <p class="user-verificador">Cargo: {{$user->Verificador}}</p>
    </div>
  </div>
</div>
</div>

@endsection