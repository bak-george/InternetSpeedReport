@props([
  'type',
  'message',
  'timeout' => 4000,
])

<div
  x-data="{ show: false }"
  x-init="
    show = true;
    setTimeout(() => show = false, {{ $timeout }})
  "
  x-show="show"
  x-transition.duration.500ms
  class="absolute inset-x-0 bottom-6 w-full max-w-sm pb-4 z-10 pointer-events-auto rounded-xl shadow-xl border border-gray-200 bg-white p-2 shadow-lg flex flex-col space-y-4 mx-auto"
>
  <div class="flex items-start gap-4">
    <div class="flex-1 py-1.5 pl-2.5 flex gap-2">
      @if($type === 'info')
        <div class="flex-shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="mt-0.5 size-4 text-blackNight">
            <path fill-rule="evenodd" d="M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0ZM9 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6.75 8a.75.75 0 0 0 0 1.5h.75v1.75a.75.75 0 0 0 1.5 0v-2.5A.75.75 0 0 0 8.25 8h-1.5Z" clip-rule="evenodd" />
          </svg>
          <span class="sr-only">Information:</span>
        </div>
      @elseif($type === 'success')
        <div class="flex-shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="mt-0.5 size-4 text-purple">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm3.844-8.791a.75.75 0 0 0-1.188-.918l-3.7 4.79-1.649-1.833a.75.75 0 1 0-1.114 1.004l2.25 2.5a.75.75 0 0 0 1.15-.043l4.25-5.5Z" clip-rule="evenodd"/>
          </svg>
          <span class="sr-only">Success:</span>
        </div>
      @elseif($type === 'error')
        <div class="flex-shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="mt-0.5 size-4 text-orangeRed">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14ZM8 4a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-1.5 0v-3A.75.75 0 0 1 8 4Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd"/>
          </svg>
          <span class="sr-only">Error:</span>
        </div>
      @endif

      <div class="flex flex-col gap-y-2">
        <p class="capitalize ubuntu-bold text-blackNight">{{ $type }}</p>
        <div class="ubuntu-regular text-blackNight">{{ $message }}</div>
      </div>
    </div>
    <div class="flex items-center">
      <button @click="show = false" type="button" class="inline-flex items-center font-medium justify-center p-1.5 rounded-md hover:bg-gray-800/5 text-gray-400 hover:text-gray-800">
        <svg aria-hidden class="size-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close notification</span>
      </button>
    </div>
  </div>
</div>
