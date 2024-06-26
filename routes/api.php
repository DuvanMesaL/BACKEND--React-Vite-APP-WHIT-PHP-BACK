<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HerramientaController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/herramientas', [HerramientaController::class, 'index']);
    Route::post('/herramientas', [HerramientaController::class, 'store']);
    Route::get('/herramientas/{id}', [HerramientaController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
