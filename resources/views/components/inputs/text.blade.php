@props(['id', 'name', 'type' => null, 'autocomplete' => '', 'required' => true, 'ariaLabel' => null, 'placeholder' => null, 'divClass', 'roundedDirection' => ''])

<div class="{{ $divClass }}">
    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="{{ $type }}"
        autocomplete="{{ $autocomplete }}"
        {{ $required ? 'required' : ''}}
        aria-label="{{ $ariaLabel }}"
        placeholder="{{ $placeholder }}"
        class="block w-full {{ $roundedDirection }} bg-white px-3 py-1.5 text-base text-gray-900
               outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400
               focus:relative focus:outline focus:outline-2 focus:-outline-offset-2
               focus:outline-indigo-600 sm:text-sm/6 ubuntu-regular"
    />
</div>
