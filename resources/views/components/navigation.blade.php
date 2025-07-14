@props(['user'])

<nav x-data="{ open: false }" class="pt-2">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 justify-between">
      <div class="flex">
        <div class="-ml-2 mr-2 flex items-center md:hidden">
          <!-- Mobile menu button -->
          <button
            @click="open = !open"
            :aria-expanded="open.toString()"
            aria-controls="mobile-menu"
            type="button"
            class="relative inline-flex items-center justify-center rounded-md p-2 text-white bg-purple hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
          >
            <span class="sr-only">Open main menu</span>
            <!-- Closed -->
            <svg
              :class="{ 'hidden': open, 'block': !open }"
              class="size-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Open -->
            <svg
              :class="{ 'block': open, 'hidden': !open }"
              class="size-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex shrink-0 items-center">
          <x-logo />
        </div>
        <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
          <x-nav-link>Dashboard</x-nav-link>
          <x-nav-link url="/api">API</x-nav-link>
        </div>
      </div>
      <div class="flex items-center">
        <div class="shrink-0">
          <x-button>SpeedTest Run</x-button>
        </div>
        <x-profile-dropdown :user="$user" />
      </div>
    </div>
  </div>

  <div
    x-show="open"
    @click.away="open = false"
    class="md:hidden"
    id="mobile-menu"
    x-cloak
   >
    <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
      <x-nav-link :mobile="true">Dashboard</x-nav-link>
      <x-nav-link url="/api" :mobile="true">API</x-nav-link>
      <x-profile-dropdown :user="$user" mobile />
    </div>
  </div>
</nav>
