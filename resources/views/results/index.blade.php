<x-layout>
    @forelse ($data as $row)
        <p>{{ $row }}</p>
    @empty
     <li>No results available</li>
    @endforelse
</x-layout>
