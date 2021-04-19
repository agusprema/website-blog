@push('meta')
    <title>{{ config('app.name', 'Laravel') }}</title>
@endpush
@push('script')
    @livewireEditorjsScripts
@endpush
<x-layouts.home-navbar-layout>
    <div>
        <div class="border-b-2 border-primary mb-2">
            <div class="sidebar-header text-fifthly">
                <div class="logo-siderbar-header text-xl xl:text-2xl inline mx-1">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="title-sidebar-header text-xl xl:text-2xl inline font-playfair">Buat Artikel Terbaru</div>
            </div>
        </div>
        <div class="p-1 text-light">
            <div>
                <x-jet-input placeholder="{{ __('Name Article') }}" id="name-article" name="article_name" :value="old('article_name')" class="block mt-1 w-full" type="text" required />
            </div>
            <livewire:editorjs editor-id="myEditor" value="" upload-disk="public" download-disk="public" placeholder="Lorem ipsum dolor sit amet" />
        </div>

        @dump(MyWebsite::theme())
    </div>
</x-layouts.home-navbar-layout>
