<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PadariaController;

//Produtos

Route::get('/',[PadariaController::class, 'index'] );
Route::get('/pagecontato',[PadariaController::class, 'pagecontato'] );
Route::get('/cadastro/carrinhocompras',[PadariaController::class, 'carrinhocompras'])->middleware('auth');
Route::get('/cadastro',[PadariaController::class, 'cadastro'] )->middleware('auth');
Route::get('/cadastro/cadastroprodutos',[PadariaController::class, 'cadastroprodutos'] )->middleware('auth');
Route::get('/cadastro/{id}',[PadariaController::class, 'show'] )->middleware('auth');
Route::post('/cadastro',[PadariaController::class, 'store'])->middleware('auth');
Route::delete('/cadastro/{id}',[PadariaController::class,'destroy'])->middleware('auth');
Route::get('/cadastro/edit/{id}',[PadariaController::class,'edit'])->middleware('auth');
Route::put('/cadastro/update/{id}',[PadariaController::class,'update'])->middleware('auth');
Route::get('/dashboard',[PadariaController::class, 'dashboard'])->middleware('auth');
Route::delete('/cadastro/leave/{id}',[PadariaController::class, 'leavecarrinho'])->middleware('auth');
Route::get('/cadastro/carrinho/{id}',[PadariaController::class, 'carrinho'])->middleware('auth');
Route::get('/rotaForm/{id}',[PadariaController::class, 'rotaForm'])->middleware('auth');

//Clientes

Route::get('/cliente/editcliente/{id}',[PadariaController::class,'editcliente'])->middleware('auth');
Route::put('/cliente/updatecliente/{id}',[PadariaController::class,'updatecliente'])->middleware('auth');
Route::get('/cliente/dashboardcliente',[PadariaController::class, 'dashboardcliente'])->middleware('auth');
Route::delete('/cliente/{id}',[PadariaController::class,'destroycliente'])->middleware('auth');

//API PAGAMENTO

Route::get('/compraconcluida',[PadariaController::class,'compraconcluida'])->middleware('auth');

//RELATORIO VENDAS
Route::get('/relatoriovendas',[PadariaController::class,'relatoriovendas'])->middleware('auth');

//COMPROVANTE
Route::get('/comprovante',[PadariaController::class,'comprovante'])->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
