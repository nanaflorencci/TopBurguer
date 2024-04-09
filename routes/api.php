<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('index/produtos', [ProdutoController::class, 'index']);
Route::post('store/produtos', [ProdutoController::class, 'store']);

Route::get('index/clientes', [ProdutoController::class, 'index']);
Route::post('store/clientes', [ProdutoController::class, 'store']);