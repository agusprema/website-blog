@props(['disabled' => false, 'checked' => false])

<input wire:loading.attr="disabled" type="checkbox" {{ $disabled ? 'disabled' : '' }} {{ $checked ? 'checked' : '' }} {!! $attributes->merge(['class' => 'inline-block mr-2 border border-gray-300']) !!} />
