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
                    <dt class="truncate ubuntu-bold text-gray-500">Ping</dt>
                    <dd class="mt-1 text-3xl tracking-tight ubuntu-regular text-gray-900">{{ round($data->ping, 2) }}</dd>
                </div>
            </dl>
            <x-server-map :serverLatitude="$data->server_lat" :serverLongitude="$data->server_lon" />
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:mx-24 rounded-lg shadow-2xl bg-white">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-500 text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 ubuntu-regular text-gray-900 sm:pl-0">Field</th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 ubuntu-regular text-gray-900 sm:pl-0">Value</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @if ($data->server_url)
                            <tr>
                                <td class="whitespace-nowrap py-4 ubuntu-light text-gray-900">Server URL</td>
                                <td class="whitespace-nowrap px-3 py-4 ubuntu-light text-gray-500">{{ $data->server_url }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td class="whitespace-nowrap py-4 ubuntu-light text-gray-900">Server Country</td>
                                <td class="whitespace-nowrap px-3 py-4 ubuntu-light text-gray-500">{{ $data->server_country }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 ubuntu-light text-gray-900">Server ID</td>
                                <td class="whitespace-nowrap px-3 py-4 ubuntu-light text-gray-500">{{ $data->server_id }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 ubuntu-light text-gray-900">Server Latency</td>
                                <td class="whitespace-nowrap px-3 py-4 ubuntu-light text-gray-500">{{ $data->server_latency }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 ubuntu-light text-gray-900">Bytes Sent</td>
                                <td class="whitespace-nowrap px-3 py-4 ubuntu-light text-gray-500">{{ $data->bytes_sent }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 ubuntu-light text-gray-900">Bytes Received</td>
                                <td class="whitespace-nowrap px-3 py-4 ubuntu-light text-gray-500">{{ $data->bytes_received }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 ubuntu-light text-gray-900">Client IP Address</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm ubuntu-light text-gray-500">{{ $data->client_ip }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 ubuntu-light text-gray-900">Client Latitude</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm ubuntu-light text-gray-500">{{ $data->client_lat }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 ubuntu-light text-gray-900">Client Longitude</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm ubuntu-light text-gray-500">{{ $data->client_lon }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 ubuntu-light text-gray-900">Client ISP</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm ubuntu-light text-gray-500">{{ $data->client_isp }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 ubuntu-light text-gray-900">Client Country</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm ubuntu-light text-gray-500">{{ $data->client_country }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
