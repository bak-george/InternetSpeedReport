<x-layout>
    <div class="mt-5 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="ubuntu-bold text-gray-900 text-left text-lg">{{ $data->name }}</h1>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none text-center">
                <button type="button" class="block rounded-md bg-red-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Delete data
                </button>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:mx-24 rounded-lg shadow-2xl bg-white">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-500 text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-0">Field</th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-0">Value</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Download Speed</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->download }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Upload Speed</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->upload }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Ping (ms)</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->ping }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Server URL</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->server_url }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Server Latitude</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->server_lat }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Server Longitude</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->server_lon }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Server Country</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->server_country }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Server ID</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->server_id }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Server Latency</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->server_latency }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Bytes Sent</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->bytes_sent }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Bytes Received</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->bytes_received }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Client IP Address</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->client_ip }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Client Latitude</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->client_lat }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Client Longitude</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->client_lon }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Client ISP</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->client_isp }}</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 text-sm font-medium text-gray-900">Client Country</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $data->client_country }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
