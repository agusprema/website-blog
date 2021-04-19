@once
    @push('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @this.on('triggerDestroy', orderId => {
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
                            Livewire.emit('Destroy', orderId)
                            Livewire.emit('ResetSelected')
                        }
                    })
                })

                @this.on('triggerRestore', orderId => {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Restore it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.emit('Restore', orderId)
                            Livewire.emit('ResetSelected')
                        }
                    })
                })

                @this.on('triggerDelete', orderId => {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.emit('Delete', orderId)
                            Livewire.emit('ResetSelected')
                        }
                    })
                })

                @this.on('triggerUnBanUser', orderId => {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Unban it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.emit('UnBanUser', orderId)
                            Livewire.emit('ResetSelected')
                        }
                    })
                })
            })

        </script>
    @endpush
@endonce

<div class="flex space-x-1 justify-around">
    @if ($ban)
        @roleorpermision('Destroy '.$model.'')
        <button wire:click="$emit('triggerUnBanUser', '{{ $raw ? (in_array($id, $raw) ? json_encode($raw) : json_encode(["$id"])) : json_encode(["$id"]) }}')" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
            <i class="fas fa-user-shield w-5 h-5"></i>
        </button>
        @endroleorpermision
    @else
        @roleorpermision('Destroy '.$model.'')
        <button wire:click="$emit('BanUser', '{{ $raw ? (in_array($id, $raw) ? json_encode($raw) : json_encode(["$id"])) : json_encode(["$id"]) }}')" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
            <i class="fas fa-ban w-5 h-5"></i>
        </button>
        @endroleorpermision
    @endif

    @roleorpermision('Update '.$model.'')
    @if (!$trash && !$ban && $edit)
        <button wire:click="$emit('EditData', {{ $id }})">
            <div class="p-1 text-teal-600 hover:bg-teal-600 hover:text-white rounded">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                </svg>
            </div>
        </button>
    @endif
    @endroleorpermision

    @if ($trash)
        @roleorpermision('Restore '.$model.'')
        <button wire:click="$emit('triggerRestore', '{{ $raw ? (in_array($id, $raw) ? json_encode($raw) : json_encode(["$id"])) : json_encode(["$id"]) }}')" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded text-xl">
            <i class="fas fa-trash-restore-alt"></i>
        </button>
        @endroleorpermision
        @roleorpermision('Delete '.$model.'')
        <button wire:click="$emit('triggerDelete', '{{ $raw ? (in_array($id, $raw) ? json_encode($raw) : json_encode(["$id"])) : json_encode(["$id"]) }}')" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded text-xl">
            <i class="fas fa-dumpster-fire"></i>
        </button>
        @endroleorpermision
    @else
        @if ($delete)
            @roleorpermision('Destroy '.$model.'')
            <button wire:click="$emit('triggerDestroy', '{{ $raw ? (in_array($id, $raw) ? json_encode($raw) : json_encode(["$id"])) : json_encode(["$id"]) }}')" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
            @endroleorpermision
        @endif
    @endif
</div>
