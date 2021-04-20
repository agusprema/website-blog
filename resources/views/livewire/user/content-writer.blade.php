@push('meta')
    <title>Create Article | {{ config('app.name', 'Laravel') }}</title>
@endpush
@push('script')
    @livewireEditorjsScripts
@endpush
<form class="container mx-auto grid grid-cols-12 gap-2 lg:gap-4 px-2 xl:px-0">
    <div class="col-span-12 lg:col-span-9">
        <div class="relative my-3">
            <div class="sidebar-header text-light border-b-2 leading-tight border-primary">
                <div class="title-sidebar-header inline-block text-lg xl:text-xl inline font-playfair bg-primary px-2">Buat Artikel Terbaru</div>
            </div>
        </div>
        <div class="p-1">
            <div>
                <x-jet-input placeholder="{{ __('Name Article') }}" id="name-article" name="article_name" :value="old('article_name')" class="block mt-1 w-full" type="text" required />
            </div>
            <livewire:my-editorjs editor-id="myEditor" value="" class="max-w-none text-dark dark:text-light prose" upload-disk="public" download-disk="public" placeholder="Lorem ipsum dolor sit amet" />
        </div>
    </div>
    <div class="col-span-12 lg:col-span-3 text-dark dark:text-light">
        <div class="mb-4">
            <button class="block bg-green-500 w-full py-2 hover:bg-opacity-75" type="submit">Save</button>
        </div>

        <div class="mb-4">
            <x-modals.label for="active" value="{{ __('Chat Active?') }}" class="block text-gray-700 text-sm font-bold mb-2 inline-block" />
            <x-modals.checkbox name="chat_active" wire:model.defer="chat_active" id="active" checked />
        </div>
    </div>
</form>
