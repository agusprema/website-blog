@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @this.on('triggerPermissionDestroy', orderId => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('DestroyPermission', orderId)
                    }
                })
            })

            @this.on('triggerRoleDestroy', orderId => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('DestroyRole', orderId)
                    }
                })
            })
        })

    </script>
@endpush
@push('modals')
    <livewire:modals.permission.edit />
    <livewire:modals.role.edit />
@endpush

<div x-data="{OpenAction: false}">
    <div class="flex items-center">
        <x-admins.title-content>Role Management</x-admins.title-content>
        <div class="mr-2">
            <x-icons.cog wire:loading class="h-12 w-12 animate-spin text-gray-400" />
        </div>
        <div class="mr-2">
            <livewire:modals.role.add />
        </div>
        <div class="mr-2">
            <livewire:modals.permission.add />
        </div>
        <div class="mr-2 cursor-pointer">
            <div @click="OpenAction = OpenAction ? false : true" class="px-3 py-1 text-white bg-primary flex items-center rounded-lg text-sm h-10">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                </svg>
            </div>
        </div>
        <div class="cursor-pointer">
            <div wire:click="giveRolePermission" class="px-3 py-1 text-white bg-primary flex items-center rounded-lg text-sm h-10">Save</div>
        </div>
    </div>
    <div class="w-full mt-2 grid grid-cols-12 gap-2">
        <div class="col-span-3">
            <div class="table w-full sticky top-0">
                <div class="table-row divide-x divide-gray-200">
                    <div class="table-cell h-12 overflow-hidden align-top">
                        <div class="w-full h-full px-6 py-3 border-b border-gray-200 bg-primary justify-center text-sm leading-4 font-medium text-white uppercase tracking-wider flex items-center focus:outline-none ">
                            <span class="inline">Role</span>
                        </div>
                    </div>
                    <div class="table-cell h-12 overflow-hidden align-top" x-show="OpenAction">
                        <div class="w-full h-full px-6 py-3 border-b border-gray-200 bg-primary justify-center text-sm leading-4 font-medium text-white uppercase tracking-wider flex items-center focus:outline-none ">
                            <span class="inline">Action</span>
                        </div>
                    </div>
                </div>
                @foreach ($roles as $role)
                    <div class="table-row p-1 divide-x divide-gray-200 bg-gray-50 cursor-pointer hover:bg-blue-200 {{ $targetRole == $role->name ? 'bg-blue-400' : '' }} {{ $loop->even ? 'bg-gray-50' : 'bg-gray-100' }}">
                        <div wire:click="ChangePermission('{{ $role->name }}')" class="px-6 py-3 whitespace-nowrap text-base leading-5 text-gray-900 table-cell text-center">{{ $role->name }}</div>
                        <div class="px-6 py-2 whitespace-nowrap text-sm leading-5 text-gray-900 table-cell text-left " x-show="OpenAction">
                            <div class="flex space-x-1 justify-around">

                                <button wire:click="$emit('EditDataRole', '{{ $role->id }}')">
                                    <div class="p-1 text-teal-600 hover:bg-teal-600 hover:text-white rounded">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </div>
                                </button>

                                <button wire:click="$emit('triggerRoleDestroy', '{{ $role->id }}')" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-span-9 relative">
            <div wire:loading.class.remove="hidden" wire:target="ChangePermission" class="hidden absolute top-0 left-0 flex items-center justify-center w-full h-full z-50 bg-gray-900 bg-opacity-50">
                <div class="flex flex-col items-center justify-center">
                    <i class="fas fa-spinner fa-pulse text-5xl text-primary"></i>
                    <div class="">Loading</div>
                </div>
            </div>
            <div class="table w-full">
                <div class="table-row divide-x divide-gray-200">
                    <div class="table-cell h-12 overflow-hidden align-top">
                        <div class="w-full h-full px-6 py-3 border-b border-gray-200 bg-primary justify-center text-sm leading-4 font-medium text-white uppercase tracking-wider flex items-center focus:outline-none ">
                            <span class="inline">Permission Name</span>
                        </div>
                    </div>
                    <div class="table-cell h-12 overflow-hidden align-top">
                        <div class="w-full h-full px-6 py-3 border-b border-gray-200 bg-primary justify-center text-sm leading-4 font-medium text-white uppercase tracking-wider flex items-center focus:outline-none ">
                            <span class="inline">Active</span>
                        </div>
                    </div>
                    <div class="table-cell h-12 overflow-hidden align-top" x-show="OpenAction">
                        <div class="w-full h-full px-6 py-3 border-b border-gray-200 bg-primary justify-center text-sm leading-4 font-medium text-white uppercase tracking-wider flex items-center focus:outline-none ">
                            <span class="inline">Action</span>
                        </div>
                    </div>
                </div>
                @foreach ($permissions as $permission)
                    <div class="table-row p-1 divide-x divide-gray-200 {{ $loop->even ? 'bg-gray-50' : 'bg-gray-100' }}">
                        <div class="px-6 py-2 whitespace-nowrap text-base leading-5 text-gray-900 table-cell text-left">{{ $permission->name }}</div>
                        <div class="px-6 py-1 whitespace-nowrap text-base leading-5 text-gray-900 table-cell text-center">
                            <label class="switch">
                                <input type="checkbox" name="permission" value="{{ $permission->name }}" wire:model.defer="selected">
                                <span class="slider round border border-primary"></span>
                            </label>
                        </div>
                        <div class="px-6 py-2 whitespace-nowrap text-sm leading-5 text-gray-900 table-cell text-left " x-show="OpenAction">
                            <div class="flex space-x-1 justify-around">

                                <button wire:click="$emit('EditDataPermission', '{{ $permission->id }}')">
                                    <div class="p-1 text-teal-600 hover:bg-teal-600 hover:text-white rounded">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </div>
                                </button>

                                <button wire:click="$emit('triggerPermissionDestroy', '{{ $permission->id }}')" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
