<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['msg' => 'Your message here']);
});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->apiResource('data', DataController::class)->except([
    'create', 'edit'
]);
