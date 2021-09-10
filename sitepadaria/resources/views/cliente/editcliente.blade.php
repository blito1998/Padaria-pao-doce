@extends('layouts.main')

@section('title', 'Editando: ' .$user->name)

@section('content')

<div id="user-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{$user->name}}</h1>
    <form action="/cliente/updatecliente/{{$user->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
         <label for="name">Nome:</label>
         <input type="text" class="form-control" id="name" name="name" placeholder="Nome do produto" value="{{$user->name}}">
        </div>
        <div class="form-group">
         <label for="email">Email do cliente:</label>
         <input type="text" class="form-control" id="email" name="email" placeholder="Email do cliente" value="{{$user->email}}" >
        </div>
        <div class="form-group">
         <label for="verificador">Cargo do cliente:</label>
         <input type="text" class="form-control" id="verificador" name="verificador" placeholder="Cargo do cliente" value="{{$user->verificador}}">
        </div>
        <input type="submit" class="btn btn-secondary" value="Confirmar">
    </form>
</div>

@endsection