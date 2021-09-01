<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PadariaController;

Route::get('/',[PadariaController::class, 'index'] );

Route::get('/pagecontato',[PadariaController::class, 'pagecontato'] );

Route::get('/cadastro',[PadariaController::class, 'cadastro'] );

Route::get('/cadastro/cadastroprodutos',[PadariaController::class, 'cadastroprodutos'] );

Route::get('/cadastro/{id}',[PadariaController::class, 'show'] );

route::post('/cadastro',[PadariaController::class, 'store']);




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
