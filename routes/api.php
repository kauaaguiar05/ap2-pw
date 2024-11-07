<?php

use App\Http\Controllers\VendedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/Vendedor', [VendedorController::class, 'index']); 
Route::get('/Vendedor', [VendedorController::class, 'show']); 
Route::get('/Vendedor', [VendedorController::class, 'store']); 
Route::get('/Vendedor', [VendedorController::class, 'update']);
Route::get('/Vendedor', [VendedorController::class, 'destroy']);

Route::get('/Produto', [VendedorController::class, 'index']); 
Route::get('/Produto', [VendedorController::class, 'show']); 
Route::get('/Produto', [VendedorController::class, 'store']); 
Route::get('/Produto', [VendedorController::class, 'update']);
Route::get('/Produto', [VendedorController::class, 'destroy']);