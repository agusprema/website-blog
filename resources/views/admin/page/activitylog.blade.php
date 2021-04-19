@push('meta')
    <title>Menu Management | {{ config('app.name', 'Laravel') }}</title>
@endpush
@push('modals')
    @livewire('modals.activity.show')
@endpush
<x-layouts.admin-layout>
    <div x-data="{trash: false}">
        <div class="flex items-center">
            <h1 class="text-3xl text-fifthly pb-1 flex flex-grow">Menu Management</h1>
        </div>

        <div class="w-full mt-2" x-show="trash == false">
            <livewire:datatable.activity-log :key="activity-log-1" />
        </div>
    </div>
</x-layouts.admin-layout>
