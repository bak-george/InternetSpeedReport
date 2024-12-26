<x-layout>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <p class="text-xl text-green-600">VT323 Regular</p>
        @forelse ($data as $row)
            <p>{{ $row->id }}</p>
        @empty
            <li>No results available</li>
        @endforelse
    </div>

</x-layout>
