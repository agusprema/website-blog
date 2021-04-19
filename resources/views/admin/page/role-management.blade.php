@push('meta')
    <title>Role Management | {{ config('app.name', 'Laravel') }}</title>
@endpush
<x-layouts.admin-layout>
    <div>
        <livewire:admins.role-permission-management />
    </div>
</x-layouts.admin-layout>
