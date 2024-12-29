<?php

use App\Http\Controllers\DataController;
use App\Models\Data;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', [DataController::class, 'index'])->name('home');

Route::get('/data/{data}', [DataController::class, 'show'])->name('data.show');

Route::post('speedtest/', function () {
    Log::info('Starting speedtest via route');

    $exitCode = Artisan::call('speedtest:run');

    if ($exitCode !== 0) {
        Log::error('Speedtest Artisan command failed. Exit code: ' . $exitCode);
        return redirect('/')->with('error', 'Speedtest command failed.');
    }

    Log::info('Speedtest completed successfully via route');
    return redirect('/')->with('success', 'Speedtest completed successfully.');
})->name('speedtest');
