@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/icon.css') }}">
    @endpush
    @push('script')
        <script src="{{ mix('js/icon.js') }}"></script>
    @endpush
@endonce
<div class="w-96 flex rounded-lg shadow-sm" id="container-icons-modal{{ $random = rand(1, 20) }}">
    <div class="relative flex-grow focus-within:z-10">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i id="IconPreview{{ $random }}" class="{{ old($model) ? old($model) : 'fas fa-search' }}"></i>
        </div>
        <input name="{{ $model }}" wire:model.defer="{{ $model }}" wire:loading.attr="disabled" id="icon{{ $random }}" size="40" placeholder="Icon" class="pl-10 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center px-2 border-gray-200 border-l">
            <button class="inline-block" type="button" id="GetIconPicker" data-icon-model="{{ $model }}" data-icon-container="container-icons-modal{{ $random }}" data-iconpicker-input="input#icon{{ $random }}" data-iconpicker-preview="i#IconPreview{{ $random }}" wire:loading.attr="disabled">
                Search Icon
            </button>
        </div>
    </div>
</div>
