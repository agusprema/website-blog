@push('meta')
    <title>{{ config('app.name', 'Laravel') }}</title>
@endpush
@push('head')
    <link href="{{ mix('css/content.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('script')
    <script type="text/javascript" src="{{ mix('js/editor.js') }}"></script>
@endpush
<x-layouts.home-layout>
    <div>
        <div class="border-b-2 border-primary mb-2">
            <div class="sidebar-header text-fifthly">
                <div class="logo-siderbar-header text-xl xl:text-2xl inline mx-1">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="title-sidebar-header text-xl xl:text-2xl inline font-playfair">News</div>
            </div>
        </div>
        <div class="p-1">
            <button id="button-save">Save</button>
            <div id="editorjs" class="bg-white" style="min-height: 150vh;"></div>
            <div id="tai"></div>
        </div>
    </div>
</x-layouts.home-layout>
