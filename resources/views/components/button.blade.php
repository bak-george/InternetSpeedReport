@props(['route' => 'run-speedtest', 'data', 'mobile' => false])

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
        class="ubuntu-medium rounded-lg px-3 py-2
               shadow-xl hover:shadow-lg
               focus-visible:outline focus-visible:outline-2
               focus-visible:outline-offset-2 focus-visible:outline-indigo-500
                {{ $mobile ? 'text-lg' : 'text-sm' }}
               {{ $route === 'delete' ? 'bg-red-500 hover:bg-gray-500 text-white' : 'text-white hover:text-blackNight bg-purple hover:bg-carrotOrange'}}"
        @if ($route !== 'delete')
            @click="isLoading = true"
        @endif
    >
        @if ($route === 'run-speedtest')
            <div class="flex flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2">
              <path fill-rule="evenodd" d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 0 1 .75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 0 1 9.75 22.5a.75.75 0 0 1-.75-.75v-4.131A15.838 15.838 0 0 1 6.382 15H2.25a.75.75 0 0 1-.75-.75 6.75 6.75 0 0 1 7.815-6.666ZM15 6.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" clip-rule="evenodd" />
              <path d="M5.26 17.242a.75.75 0 1 0-.897-1.203 5.243 5.243 0 0 0-2.05 5.022.75.75 0 0 0 .625.627 5.243 5.243 0 0 0 5.022-2.051.75.75 0 1 0-1.202-.897 3.744 3.744 0 0 1-3.008 1.51c0-1.23.592-2.323 1.51-3.008Z" />
            </svg>
            <span x-show="!isLoading">Run Speed Test</span>
            <span x-cloak x-show="isLoading">Running... this may take a while</span>
            </div>
        @elseif ($route === 'generate.token')
            <span x-show="!isLoading">Generate Token</span>
            <span x-cloak x-show="isLoading">Generating...</span>
        @else
            {{ $slot }}
        @endif
    </button>
</form>
