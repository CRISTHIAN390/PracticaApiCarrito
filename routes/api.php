<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteController;

Route::get('/clientes',[ClienteController::class,'index']);
Route::get('/clientes/{id}', [ClienteController::class,'show']);
Route::post('/clientes',[ClienteController::class,'store']);
Route::put('/clientes/{id}', [ClienteController::class,'update']);
Route::patch('/clientes/{id}', [ClienteController::class,'updatepartial']);
Route::delete('/clientes/{id}', [ClienteController::class,'destroy']);

