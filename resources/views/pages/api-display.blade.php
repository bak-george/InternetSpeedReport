<x-layout>
    <div class="space-y-4">
    <section class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="px-4 sm:px-6 lg:px-8 rounded-lg shadow-2xl bg-white">
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle">
                    <table class="min-w-full divide-y-2 divide-gray">
                    <thead>
                        <tr>
                        <th scope="col" class="table-header sm:pl-3">Token</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($userTokens as $userToken)
                        <tr class="even:bg-gray-50 hover:bg-gray-200">
                            <td class="table-data-rows sm:pl-3">{{ $userToken->token }}</td>
                            <td class="table-data-rows sm:pl-3 cursor-pointer">
                                <form method="POST" action="{{route('token.delete', $userToken->id)}}"
                                    onsubmit="return confirm('Are you sure you want to delete this token?')"
                                    >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="block text-sm leading-6 text-black hover:text-red"
                                    >
                                        Delete
                                    </button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>

        </div>
    </section>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <div class="flex space-x-2">
                @if (request()->is('api'))
                    <x-button :route="'generate.token'" />
                @endif
            </div>
        </div>
    </div>
    </div>
</x-layout>
