<x-layout>
    @forelse ($results as $result)
        <p class="font-vt323">$result</p>
    @empty
        <li>No results available</li>
    @endforelse
</x-layout
