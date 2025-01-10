<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

function checkEnvVariables(): array
{
    $isMapboxApiKeyEmpty = empty(env('MAPBOX_API_KEY'));
    $isSpeedtestPathEmpty = empty(env('SPEEDTEST_PATH'));

    return [
        'isMapboxApiKeyEmpty' => $isMapboxApiKeyEmpty,
        'isSpeedtestPathEmpty' => $isSpeedtestPathEmpty,
    ];
}

function convertToMegabytes(float $value): float
{
    return $value / (1024 * 1024);
}

function appendMessageIfFalse(&$msg, $condition, $errorMessage)
{
    if (!$condition) {
        $msg .= $errorMessage . ' ';
    }
}

function checkAppVersion($version) {
    $envExamplePath = base_path('.env.example');

    if (!file_exists($envExamplePath)) {
        return false;
    }

    $envExampleContent = file_get_contents($envExamplePath);

    preg_match('/^APP_VERSION\s*=\s*(.*)$/m', $envExampleContent, $matches);

    if (!isset($matches[1])) {
        return false;
    }

    $envVersion = trim($matches[1]);
    $version = trim($version);

    return $envVersion === $version;
}

function loginTokenUser($email, $remember)
{
    $user = User::where('email', $email)->first();

    if ($user) {
        Auth::login($user, $remember);
        return $user;
    } else {
        Log::warning("Login attempt failed: User with email {$email} not found.");
        return false;
    }
}
