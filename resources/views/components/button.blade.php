@props(['route' => 'speedtest'])

<form method="POST" action="{{ route($route) }}">
    @csrf
    <button
        type="submit"
        class="ubuntu-medium rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
        >
        {{ $slot }}
    </button>
</form>
