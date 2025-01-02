<x-layout>
    <div class="mt-5 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
            <div class="sm:flex sm:items-center">
                <h3 class="ubuntu-bold text-gray-900 text-left text-xl">{{ $data->name }}</h3>
                <div class="mt-5 sm:ml-auto sm:mt-0 sm:flex-none text-right">
                    <x-button :route="'delete'" :data="$data">
                        Delete Data
                    </x-button>
                </div>
            </div>
            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                    <dt class="truncate ubuntu-bold text-gray-500">Download Speed (Mbps)</dt>
                    <dd class="mt-1 text-3xl tracking-tight ubuntu-regular text-gray-900">{{ round($data->download / (1024 * 1024), 2) }}</dd>
                </div>
                <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                    <dt class="truncate ubuntu-bold text-gray-500">Upload Speed (Mbps)</dt>
                    <dd class="mt-1 text-3xl tracking-tight ubuntu-regular text-gray-900">{{ round($data->upload / (1024 * 1024), 2) }}</dd>
                </div>
                <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                    <dt class="truncate ubuntu-bold text-gray-500">Ping (Server Latency)</dt>
                    <dd class="mt-1 text-3xl tracking-tight ubuntu-regular text-gray-900">{{ round($data->ping, 2) }}</dd>
                </div>
            </dl>
            <h4 class="ubuntu-regular text-gray-900 text-left text-xl mt-5">Server Country: {{ $data->server_country }} / Server id: {{ $data->server_id }} </h4>
            <x-server-map :mapId="'server_info'" :serverLatitude="$data->server_lat" :serverLongitude="$data->server_lon" />
        </div>
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate ubuntu-bold text-gray-500">IP Address</dt>
                <dd class="mt-1 text-3xl tracking-tight ubuntu-regular text-gray-900">{{ $data->client_ip }}</dd>
            </div>
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate ubuntu-bold text-gray-500">ISP</dt>
                <dd class="mt-1 text-3xl tracking-tight ubuntu-regular text-gray-900">{{ $data->client_isp }}</dd>
            </div>
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate ubuntu-bold text-gray-500">Client Country</dt>
                <dd class="mt-1 text-3xl tracking-tight ubuntu-regular text-gray-900">{{ $data->client_country }}</dd>
            </div>
        </dl>
        <h4 class="ubuntu-regular text-gray-900 text-left text-xl mt-5">Client Location</h4>
        <x-server-map :mapId="'client_info'" :serverLatitude="$data->client_lat" :serverLongitude="$data->client_lon" />
    </div>
</x-layout>
