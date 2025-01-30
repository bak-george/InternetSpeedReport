<?php

use App\Http\Controllers\ApiKeys;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DataController::class, 'index'])->name('home');

Route::get('/data/{data}', [DataController::class, 'show'])->name('data.show');

Route::post('/run-speedtest', [DataController::class, 'runSpeedTest'])->name('run-speedtest');

Route::delete('/data/{data}', [DataController::class, 'destroy'])->name('delete');

Route::get('/api', [ApiKeys::class, 'index'])->name('api');
Route::delete('/token/{token}', [ApiKeys::class, 'deleteToken'])->name('token.delete');

Route::get('/profile/{user}', function() {
    return view('pages.profile');
});
