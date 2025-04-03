@props(['id', 'name', 'type' => null, 'autocomplete', 'required' => true, 'aria-label' => null, 'placeholder' => null])

<div class="col-span-2">
    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="{{ $type }}"
        autocomplete="{{ $autocomplete }}"
        {{ $required ? 'required' : ''}}
        aria-label="{{ $aria-label }}"
        placeholder="{{ $placeholder }}"
        class="block w-full rounded-t-md bg-white px-3 py-1.5 text-base text-gray-900
               outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400
               focus:relative focus:outline focus:outline-2 focus:-outline-offset-2
               focus:outline-indigo-600 sm:text-sm/6 ubuntu-regular"
    />
</div>
