<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Api\CheckController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CheckItemController;

// Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', LoginController::class)->name('login');
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

Route::middleware('auth:api')->group(function () {
    Route::post('/check-store', [CheckController::class, 'store']);
    Route::post('/check-delete/{id}', [CheckController::class, 'delete']);
    Route::get('/check-show', [CheckController::class, 'show']);
    Route::get('/check-detail/{id}', [CheckController::class, 'detail']);

    Route::post('/check-item-store/{id}', [CheckItemController::class, 'store']);
    Route::post('/check-item-update/{id}', [CheckItemController::class, 'update']);
});
