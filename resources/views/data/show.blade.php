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
            <x-three-stat-card :firstLabel="'Download Speed (Mbps)'" :firstData="round($data->download, 2)"
                               :secondLabel="'Upload Speed (Mbps)'"  :secondData="round($data->upload, 2)"
                               :thirdLabel="'Ping (Server Latency)'" :thirdData="round($data->ping, 2)"
            />
            <h4 class="ubuntu-regular text-gray-900 text-lefDownload Speed (Mbps)t text-xl mt-5">Server Country: {{ $data->server_country }} / Server id: {{ $data->server_id }} </h4>
            <x-server-map :mapId="'server_info'" :serverLatitude="$data->server_lat" :serverLongitude="$data->server_lon" />
        </div>
        <x-three-stat-card :firstLabel="'IP Address'" :firstData="$data->client_ip"
                           :secondLabel="'ISP'" :secondData="$data->client_isp"
                           :thirdLabel="'Client Country'" :thirdData="$data->client_country"
        />
        <h4 class="ubuntu-regular text-gray-900 text-left text-xl mt-5">Client Location</h4>
        <x-server-map :mapId="'client_info'" :serverLatitude="$data->client_lat" :serverLongitude="$data->client_lon" />
    </div>
</x-layout>
