<?php

use App\Http\Controllers\ApiKeysController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\DataController;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function (){
    Route::get('/', [DataController::class, 'index'])->name('home');

    Route::get('/profile/{user}', function(User $user) {
        return view('pages.profile', ['user' => $user]);
    });

    Route::delete('/user/{user}', [AccountController::class, 'delete'])->name('user.delete');

    Route::get('/data/{data}', [DataController::class, 'show'])->name('data.show');

    Route::post('/run-speedtest', [DataController::class, 'runSpeedTest'])->name('run-speedtest');

    Route::delete('/data/{data}', [DataController::class, 'destroy'])->name('delete');

    Route::get('/api', [ApiKeysController::class, 'index'])->name('api');
    Route::post('/api/token/generate', [ApiKeysController::class, 'generateToken'])->name('generate.token');
    Route::delete('/token/{token}', [ApiKeysController::class, 'deleteToken'])->name('token.delete');
});



Route::get('/about', function() {
    return view('pages.about');
});
