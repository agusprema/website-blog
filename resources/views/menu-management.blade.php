@push('meta')
    <title>Menu Management | {{ config('app.name', 'Laravel') }}</title>
@endpush
<x-layouts.admin-layout>
    <div>
        <div class="flex items-center">
            <h1 class="text-3xl text-fifthly pb-1 flex flex-grow">Menu Management</h1>
            <x-modals.trash-button />
            <livewire:modals.menus />
        </div>

        <div class="w-full mt-2">
            <livewire:datatable.menu-management />
            {{-- <livewire:admins.menu-management /> --}}
        </div>
    </div>
</x-layouts.admin-layout>
