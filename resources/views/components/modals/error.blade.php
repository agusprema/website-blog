@props(['for'])

@error($for)
    <span {{ $attributes->merge(['class' => 'text-red-500 text-sm']) }}>{{ $message }}</span>
@enderror
