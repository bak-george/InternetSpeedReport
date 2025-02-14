<x-layout>
    @if ($data->isNotEmpty())
    <x-data-chart :data="$data" />
    <section class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="px-4 sm:px-6 lg:px-8 rounded-lg shadow-2xl bg-white">
            <div class="mt-8 flow-root">
              <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle">
                  <table class="min-w-full divide-y-2 divide-gray">
                    <thead>
                      <tr>
                        <th scope="col" class="table-header sm:pl-3">Name</th>
                        <th scope="col" class="table-header sm:pl-3">Date</th>
                        <th scope="col" class="table-header">Download (Mbps)</th>
                        <th scope="col" class="table-header">Upload (Mbps)</th>
                        <th scope="col" class="table-header">Ping</th>
                        <th scope="col" class="table-header">Country - Server</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">
                            <span class="sr-only">Show More</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($dataPaginated as $row)
                            <x-data-row :row="$row" />
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-4">
            {{ $dataPaginated->links('vendor.pagination.tailwind') }}
          </div>
    </section>
    @else
    <section class="mx-auto max-w-7xl sm:px-6 lg:px-8 mt-5">
        <button type="button" class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center">
            <svg class="mx-auto size-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
            </svg>
            <span class="mt-2 block text-sm text-gray-500 ubuntu-regular">There are no data to display.</span>
            <p class="ubuntu-regular text-sm text-gray-500">Open your terminal and run <code class="text-gray-900">cd Herd/InternetSpeedReport && php artisan speedtest:run</code></p>
        </button>
    </section>
    @endif

</x-layout>
