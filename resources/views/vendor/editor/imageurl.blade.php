<div class="editor-js-block">
    <div class="editor-js-image text-sm {{ $classes }}">
        <img src="{{ $url }}" alt="{{ $caption }}" class="w-full">
        @if (!empty($caption))
            <caption>{{ $caption }}</caption>
        @endif
    </div>
</div>
