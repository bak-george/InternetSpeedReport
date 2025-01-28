<x-layout>
    <section class="mt-5 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <x-api-key-display />
        <section class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8 rounded-lg shadow-2xl bg-white">
                <div class="mt-8 flow-root">
                  <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle">
                      <table class="min-w-full divide-y-2 divide-gray">
                        <thead>
                          <tr>
                            <th scope="col" class="table-header sm:pl-3">id</th>
                            <th scope="col" class="table-header sm:pl-3">Token</th>
                          </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($userTokens as $userToken)
                            <tr class="even:bg-gray-50 hover:bg-gray-200">
                                <td class="table-data-rows sm:pl-3">{{ $userToken->id }}</td>
                                <td class="table-data-rows sm:pl-3 cursor-pointer">{{ $userToken->token }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </section>
    </section>
</x-layout>
