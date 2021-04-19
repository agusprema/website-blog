<x-modals.container title="Ban User" entangle="modalBan">
    <form @roleorpermision('Create Menu') wire:submit.prevent="banuser" @endroleorpermision id="ban-user">
        <div class="mt-2">
            <div class="mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="comment">
                    Comment
                </label>
                <input wire:model.defer="comment" name="comment" id="comment" type="text" placeholder="Comment" value="{{ old('comment') }}" size="100%" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('comment')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="expire-at">
                    Expired at
                </label>
                <input wire:model.defer="expired_at" name="expired_at" id="expire-at" type="date" placeholder="Expired at" value="{{ old('expired_at') }}" size="100%" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('expired_at')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="mb-2" wire:ignore>
                <input name="permanent" wire:model.defer="permanent" id="active" type="checkbox" checked class="inline-block mr-2 border border-gray-300" wire:loading.attr="disabled" wire:target="submit">
                <label class="block text-gray-700 text-sm font-bold mb-2 inline-block" for="active">
                    Permanent
                </label>
            </div>

            <div class="mt-5 sm:mt-6">
                <span class="flex w-full rounded-md shadow-sm">
                <button id="save-ban-user" type="submit" @roleorpermision('Create Menu') @else disabled @endroleorpermision class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
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
