<?php

use App\Http\Controllers\LojaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\Route;

/**
 * Route send-email - https://mailtrap.io
 */
Route::get('send-email/{id}', [SendEmailController::class, 'index']);
/**
 * Routes Lojas
 */
Route::resource('lojas', LojaController::class);
/**
 * Routes Produtos
 */
Route::resource('produtos', ProdutoController::class);

Route::get('/', function () {
    return view('welcome');
});
