<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PadariaController;

Route::get('/',[PadariaController::class, 'index'] );

Route::get('/pagecontato',[PadariaController::class, 'pagecontato'] );

Route::get('/cadastro',[PadariaController::class, 'cadastro'] )->middleware('auth');

Route::get('/cadastro/cadastroprodutos',[PadariaController::class, 'cadastroprodutos'] );

Route::get('/cadastro/{id}',[PadariaController::class, 'show'] );

Route::post('/cadastro',[PadariaController::class, 'store']);

Route::delete('/cadastro/{id}',[PadariaController::class,'destroy']);

Route::get('/dashboard',[PadariaController::class, 'dashboard'])->middleware('auth');
