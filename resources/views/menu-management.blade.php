@push('meta')
    <title>Menu Management | {{ config('app.name', 'Laravel') }}</title>
@endpush
<x-layouts.admin-layout>
    <div>
        <div class="flex items-center">
            <x-admins.title-content>Menu Management</x-admins.title-content>
            <x-modals.trash-button />
            <livewire:modals.menus />
        </div>

        <div class="w-full mt-2">
            <livewire:datatable.menu-management />
            {{-- <livewire:admins.menu-management /> --}}
        </div>
    </div>
</x-layouts.admin-layout>
