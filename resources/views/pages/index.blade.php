<x-layout>
    @forelse ($results as $result)
        <p>$result</p>
    @empty
        <li>No results available</li>
    @endforelse
</x-layout>
