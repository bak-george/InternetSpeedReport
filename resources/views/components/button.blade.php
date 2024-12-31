@props(['route' => 'speedtest', 'data'])

<form method="POST"
      @if ($route === 'delete')
         action="{{ route($route, $data->id) }}"
         onsubmit="return confirm('Are you sure you want to delete this data')"
      @else
         action="{{ route($route) }}"
      @endif
    >
    @csrf
    @if ($route === 'delete')
        @method('DELETE')
    @endif
    <button
        type="submit"
        class="ubuntu-medium rounded-md px-3.5 py-2.5
               text-sm text-white shadow-sm
               focus-visible:outline focus-visible:outline-2
               focus-visible:outline-offset-2 focus-visible:outline-indigo-500
               {{ $route === 'delete' ? 'bg-red-500 hover:bg-gray-500' : 'bg-indigo-500 hover:bg-indigo-500'}}
               "
        >
        {{ $slot }}
    </button>
</form>
