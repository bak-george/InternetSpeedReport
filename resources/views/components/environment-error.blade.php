@props(['mapboxApiKey' => null, 'speedTestPath' => null])
@php
    $result = checkEnvVariables();
    $mapBoxExists = !$result['isMapboxApiKeyEmpty'];
    $speedPathExists = !$result['isSpeedtestPathEmpty'];
    $userCount = \App\Models\User::count();
    $msg = '';

    if (!$mapBoxExists) {
        $msg .= 'MAPBOX_API_KEY .env variable is empty. ';
    }

    if (!$speedPathExists) {
        $msg .= 'SPEEDTEST_PATH .env variable is empty. ';
    }

    if ($userCount === 0) {
        $msg .= 'Run php artisan db:seed to get the user for generating API tokens';
    }

@endphp
@if ($msg != '')
<div>
    <div class="mt-5 rounded-lg bg-red-500 p-4">
        <div class="flex">
            <div class="shrink-0">
            <svg class="size-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
            </svg>
            </div>
            <div class="ml-3">
            <h3 class="ubuntu-bold text-white">Warning</h3>
            <div class="mt-2 ubuntu-regular text-white">
                <p>
                    {{ $msg }}
                </p>
            </div>
         </div>
      </div>
    </div>
</div>
@endif
