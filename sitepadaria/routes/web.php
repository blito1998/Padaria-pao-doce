<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PadariaController;

Route::get('/',[PadariaController::class, 'index'] );
Route::get('/pagecontato',[PadariaController::class, 'pagecontato'] );

Route::get('/cadastro/carrinhocompras',[PadariaController::class, 'carrinhocompras']);
Route::get('/cadastro',[PadariaController::class, 'cadastro'] )->middleware('auth');
Route::get('/cadastro/cadastroprodutos',[PadariaController::class, 'cadastroprodutos'] );
Route::get('/cadastro/{id}',[PadariaController::class, 'show'] );
Route::post('/cadastro',[PadariaController::class, 'store']);
Route::delete('/cadastro/{id}',[PadariaController::class,'destroy'])->middleware('auth');
Route::get('/cadastro/edit/{id}',[PadariaController::class,'edit'])->middleware('auth');
Route::put('/cadastro/update/{id}',[PadariaController::class,'update'])->middleware('auth');

Route::get('/dashboard',[PadariaController::class, 'dashboard'])->middleware('auth');

Route::delete('/cadastro/leave/{id}',[PadariaController::class, 'leavecarrinho'])->middleware('auth');
Route::get('/cadastro/carrinho/{id}',[PadariaController::class, 'carrinho'])->middleware('auth');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
