<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.api.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.api.show');
    Route::get('/messages/{user}', [MessageController::class, 'listMessages'])->name('messages.list');
    Route::post('/messages/store', [MessageController::class, 'store'])->name('messages.store');
});