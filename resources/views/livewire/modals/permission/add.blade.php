<x-modals.container title="Modal Add Permission" entangle="modalAddPermission">
    <x-slot name="button">
        <i class="fas fa-plus-circle mr-2"></i>New Permission
    </x-slot>

    <form @roleorpermision('Create Menu') wire:submit.prevent="submitAddPermission" @endroleorpermision id="from-permission">
        <div class="mt-2">
            <div class="mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name-permission">
                    Name Permission
                </label>
                <input wire:model.defer="name" name="name" id="name-permission" type="text" placeholder="Name" value="{{ old('name') }}" size="100%" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="guard_name-permission">
                    Guard Name
                </label>
                <input wire:model.defer="guard_name" name="guard_name" id="guard_name-permission" type="text" placeholder="Guard Name" value="{{ old('guard_name') }}" size="100%" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('guard_name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <span class="flex w-full rounded-md shadow-sm">
                <button id="save-permission" type="submit" @roleorpermision('Create Menu') @else disabled @endroleorpermision class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                        Save
                        <div class="ml-2" wire:loading>
                            <i class="fas fa-spinner fa-pulse"></i>
                        </div>
                    </button>
                </span>
            </div>
        </div>
    </form>
</x-modals.container>
