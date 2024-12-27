@props(['row', ])

<tr class="even:bg-gray-50 hover:bg-gray-200">
    <td class="ubuntu-regular whitespace-nowrap py-4 pl-4 pr-3 text-sm text-center text-gray-500 sm:pl-3">{{ $row->name }}</td>
    <td class="ubuntu-regular whitespace-nowrap py-4 pl-4 pr-3 text-sm text-center text-gray-500 sm:pl-3">{{ $row->created_at }}</td>
    <td class="ubuntu-regular whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">{{ $row->download }}</td>
    <td class="ubuntu-regular whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">{{ $row->upload }}</td>
    <td class="ubuntu-regular whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">{{ $row->ping }}</td>
    <td class="ubuntu-regular whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">{{ $row->server_country }}</td>
    <td class="ubuntu-regular relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-3">
        <a href="#" class="text-blue-500 hover:text-orange-500">Show More<span class="sr-only">, Lindsay Walton</span></a>
    </td>
</tr>
