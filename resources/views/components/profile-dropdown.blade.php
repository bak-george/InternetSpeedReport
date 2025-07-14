@props(['user', 'mobile' => false])

<div class="{{ $mobile ? '' : 'hidden md:ml-4 md:flex md:shrink-0 md:items-center' }}">
    <script defer src="https://unpkg.com/@alpinejs/ui@3.14.9/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/focus@3.14.9/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.14.9/dist/cdn.min.js"></script>
    <div x-data x-popover class="relative max-w-full">
        <button x-popover:button class="group flex items-center rounded-lg w-full px-3 py-2 hover:bg-gray-800/10">
            <span class="text-blackNight group-hover:text-gray-800 ubuntu-regular truncate ml-4 {{ $mobile ? 'w-full text-lg' : '' }}">
                {{ $user->name }}
            </span>

            <svg  class="ml-2 shrink-0 size-4 text-blackNight group-hover:text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
        <div
            x-popover:panel
            x-transition.origin.top.left
            x-cloak
            class="absolute left-0 min-w-48 rounded-lg shadow-sm mt-2 z-10 ubuntu-regular
                origin-top-left bg-white p-1.5 outline-none border border-gray-200
                {{ $mobile ? 'w-full text-lg' : '' }}
                "
         >
         <x-profile-link-menu :url="'/profile/' . $user->id">Account</x-profile-link-menu>
           <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
              type="submit"
              class="group px-2 py-1.5 w-full flex items-center rounded-md text-blackNight hover:bg-orangeRed hover:text-white"
            >
                <svg class="shrink-0 size-5 mr-2 text-blackNight group-focus-visible:text-white group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M6 10a.75.75 0 0 1 .75-.75h9.546l-1.048-.943a.75.75 0 1 1 1.004-1.114l2.5 2.25a.75.75 0 0 1 0 1.114l-2.5 2.25a.75.75 0 1 1-1.004-1.114l1.048-.943H6.75A.75.75 0 0 1 6 10Z" clip-rule="evenodd" />
                </svg>
                Logout
            </button>
           </form>
        </div>
    </div>
</div>
