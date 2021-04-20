@push('meta')
    <title>Menu Management | {{ config('app.name', 'Laravel') }}</title>
@endpush
@push('modals')
    @livewire('modals.user.ban-user')
@endpush
<div>
    <div class="flex items-center">
        <x-admins.title-content>Users Management</x-admins.title-content>
        <div x-data="{ban: false, trash: false}">
            <button @click="trash = trash == false ? true : false; Livewire.emit('ToggleTrash', trash); ban = false" class="mr-2">
                <div class="px-3 py-1 text-white bg-primary flex items-center rounded-lg text-sm h-10"><i x-bind:class="trash ? 'fas fa-table' : 'fas fa-trash-alt'"></i></div>
            </button>

            <button @click="ban = ban == false ? true : false; Livewire.emit('ToggleBan', ban); trash = false" class="mr-2">
                <div class="px-3 py-1 text-white bg-primary flex items-center rounded-lg text-sm h-10"><i x-bind:class="ban ? 'fas fa-table' : 'fas fa-ban'"></i></div>
            </button>
        </div>
    </div>

    <div class="w-full mt-2">
        <livewire:datatable.users-management />
    </div>
</div>
