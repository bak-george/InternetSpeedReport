<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the API!']);
});

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    Route::apiResource('data', DataController::class)->except(['edit']);
});
