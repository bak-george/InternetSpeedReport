@props(['route' => 'speedtest', 'data'])

<form method="POST"
      @if ($route === 'delete')
         action="{{ route($route, $data->id) }}"
         onsubmit="return confirm('Are you sure you want to delete this data?')"
      @else
         action="{{ route($route) }}"
      @endif
      x-data="{ isLoading: false }"
    >
    @csrf
    @if ($route === 'delete')
        @method('DELETE')
    @endif
    <button
        type="submit"
        class="ubuntu-medium rounded-lg px-3.5 py-2.5
               text-sm text-white shadow-lg
               focus-visible:outline focus-visible:outline-2
               focus-visible:outline-offset-2 focus-visible:outline-indigo-500
               {{ $route === 'delete' ? 'bg-red-500 hover:bg-gray-500' : 'bg-indigo-500 hover:bg-orange-500'}}"
        @if ($route !== 'delete')
            @click="isLoading = true"
        @endif
    >
        @if ($route === 'run-speedtest')
            <span x-show="!isLoading">Run Speed Test</span>
            <span x-show="isLoading">Running... this may take a while</span>
        @else
            {{ $slot }}
        @endif
    </button>
</form>
