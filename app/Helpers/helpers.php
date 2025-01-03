<?php

function checkEnvVariables()
{
    $isMapboxApiKeyEmpty = empty(env('MAPBOX_API_KEY'));
    $isSpeedtestPathEmpty = empty(env('SPEEDTEST_PATH'));

    return [
        'isMapboxApiKeyEmpty' => $isMapboxApiKeyEmpty,
        'isSpeedtestPathEmpty' => $isSpeedtestPathEmpty,
    ];
}
