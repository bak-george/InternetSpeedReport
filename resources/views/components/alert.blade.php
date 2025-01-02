@props(['type', 'message', 'timeout' => '5000'])

@if(session()->has($type))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, {{ $timeout }})" x-show="show"
    class="fixed bottom-4 left-1/2 transform -translate-x-1/2 p-4 text-sm text-white rounded shadow-md {{$type == 'success' ? 'bg-green-500' : 'bg-red-500'}}">
        {{$message}}
    </div>
@endif
