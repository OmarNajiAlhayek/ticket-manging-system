@props(['name' => ''])

@error($name)
    <p id="{{ $name }}-message" class="mt-1 text-xs font-semibold text-red-500">{{ $message }}</p>
@enderror
