<?php

use App\Models\User;

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
