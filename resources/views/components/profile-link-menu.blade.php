@props(
    ['url']
)
<a
    href="{{ $url }}"
    class="group px-2 py-1.5 w-full flex items-center rounded-lg transition-colors text-left text-blackNight focus-visible:bg-gray-50 hover:bg-ashGray hover:text-blackNight"
>
    @if ($slot == 'Account')
        <svg class="shrink-0 size-5 mr-2 text-blackNight" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
        </svg>
    @endif
    {{ $slot }}
</a>
