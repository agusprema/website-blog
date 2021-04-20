@push('meta')
    <title>Activity Log | {{ config('app.name', 'Laravel') }}</title>
@endpush
@push('modals')
    @livewire('modals.activity.show')
@endpush
<div x-data="{trash: false}">
    <div class="flex items-center">
        <x-admins.title-content>Activity Log</x-admins.title-content>
    </div>

    <div class="w-full mt-2" x-show="trash == false">
        @livewire('datatable.activity-log')
    </div>
</div>
