@props(['label' => null, 'id', 'name', 'type' => 'text', 'value' => '', 'placeholder' => '', 'required' => false, 'colSpan' => ''])

<div class="{{ $colSpan }}">
    @if ($label)
    <label for="{{ $id }}" class="block text-sm/6 font-medium ubuntu-bold text-gray-900">{{ $label }}</label>
    @endif

    <div class="mt-2">
        <input type="{{ $type }}"
              name="{{ $name }}" id="{{ $id }}"
              autocomplete="{{ $name }}"
              value="{{old($name, $value)}}"
              {{ $required ? 'required' : '' }}
              class="block w-full rounded-md bg-white px-3 py-1.5 text-base ubuntu-regular
                   text-blackNight outline outline-1 -outline-offset-1 outline-ashGray
                   placeholder:text-ashGray focus:outline focus:outline-2
                   focus:-outline-offset-2 focus:outline-purple sm:text-sm/6
                   @error($name) border-orangeRed @enderror" />
        @error($name)
        <p class="text-orangeRed text-sm mt-1">{{$message}}</p>
        @enderror
    </div>
</div>
