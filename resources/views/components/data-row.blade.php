@props(['row'])

<tr class="even:bg-gray-50 hover:bg-gray-200">
    <td class="table-data-rows sm:pl-3">{{ $row->name }}</td>
    <td class="table-data-rows sm:pl-3">{{ $row->created_at }}</td>
    <td class="table-data-rows sm:pl-3">{{ round(($row->download), 2) }}</td>
    <td class="table-data-rows sm:pl-3">{{ round($row->upload, 2) }}</td>
    <td class="table-data-rows sm:pl-3">{{  round($row->ping, 2) }}</td>
    <td class="table-data-rows sm:pl-3">{{ $row->server_country }}</td>
    <td class="table-data-rows sm:pr-3">
        <a href="{{ route('data.show', $row->id) }}" class="text-blue-500 hover:text-orange-500">Show More</a>
    </td>
</tr>
