<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BukuApiController;  // ← UBAH INI!

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/buku', [BukuApiController::class, 'index']);      // ← UBAH INI!
    Route::get('/buku/{id}', [BukuApiController::class, 'show']);   // ← UBAH INI!
    Route::post('/buku', [BukuApiController::class, 'store']);      // ← UBAH INI!
    Route::put('/buku/{id}', [BukuApiController::class, 'update']); // ← UBAH INI!
    Route::delete('/buku/{id}', [BukuApiController::class, 'destroy']); // ← UBAH INI!
    Route::post('/logout', [AuthController::class, 'logout']);
});