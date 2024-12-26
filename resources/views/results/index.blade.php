<x-layout>
    <section class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="px-4 sm:px-6 lg:px-8 rounded-lg shadow-2xl bg-white">
            <div class="mt-8 flow-root">
              <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle">
                  <table class="min-w-full divide-y-2 divide-charcoal">
                    <thead>
                      <tr>
                        <th scope="col" class="ubuntu-regular text-lg py-3.5 pl-4 pr-3 text-left text-gray-900 sm:pl-3">Name</th>
                        <th scope="col" class="ubuntu-regular text-lg py-3.5 pl-4 pr-3 text-left text-gray-900 sm:pl-3">Date</th>
                        <th scope="col" class="ubuntu-regular text-lg px-3 py-3.5 text-left text-gray-900">Download</th>
                        <th scope="col" class="ubuntu-regular text-lg px-3 py-3.5 text-left text-gray-900">Upload</th>
                        <th scope="col" class="ubuntu-regular text-lg px-3 py-3.5 text-left text-gray-900">Ping</th>
                        <th scope="col" class="ubuntu-regular text-lg px-3 py-3.5 text-left text-gray-900">Country (Server)</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3">
                            <span class="sr-only">Show More</span>
                          </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($data as $row)
                            <x-data-row :row="$row" />
                        @empty
                            <li>No results available</li>
                        @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </section>
</x-layout>
