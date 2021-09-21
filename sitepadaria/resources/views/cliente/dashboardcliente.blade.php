@extends('layouts.main')

@section('title', 'dashboard')

@section('content')

<div class="col-md-12 dashboard-product-container">
    <div class="row">
    <div class="col-md-2 text-center">
            <a href="/register"  class="btn btn-secondary" id="cliente-submit">Cadastrar clientes</a>
        </div>
        <div class="col-md-10">
            @if(count($users)>0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td><a href="/user/{{ $user -> id }}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->Verificador}}</td>
                            <td>
                                
                            
                            <a href="/cliente/editcliente/{{$user->id}}" class="btn btn-info edit btn">EDITAR</a> 

                                <form action="/cliente/{{$user->id}}" method="POST">
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
            <p>Não há clientes cadastrados, <a href="/register">Cadastrar cliente</a></p>
            @endif
        </div>
    </div>
</div>






@endsection
