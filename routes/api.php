<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VersionController;
use App\Http\Controllers\Api\ClientController;

Route::prefix('v1')->group(function () {
    // Public routes
    Route::get('/db-version', VersionController::class);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
        Route::prefix('clients')->group(function () {
            Route::get('/', [ClientController::class, 'index']);
            Route::post('/', [ClientController::class, 'store']);
            Route::get('{id}', [ClientController::class, 'show']);
            Route::put('{id}', [ClientController::class, 'update']);
            Route::delete('{id}', [ClientController::class, 'destroy']);
        });

    });

    // User management routes
    // Route::prefix('users')->group(function () {
    //     Route::get('/', [UserController::class, 'index']);
    //     Route::post('/', [UserController::class, 'store']);
    //     Route::get('{id}', [UserController::class, 'show']);
    //     Route::put('{id}', [UserController::class, 'update']);
    //     Route::delete('{id}', [UserController::class, 'destroy']);
    // });

    // Client management routes
});



