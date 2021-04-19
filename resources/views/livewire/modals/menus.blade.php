<x-modals.container title="Modal Add Menu" entangle="showModal">
    <x-slot name="button">
        <i class="fas fa-plus-circle mr-2"></i>New Menu
    </x-slot>

    <form @roleorpermision('Create Menu') wire:submit.prevent="{{ $editMode ? 'update' : 'store' }}" @endroleorpermision id="from">
        <div class="mt-2">
            <div class="mb-2">
                <x-modals.label for="menu_name" value="{{ __('Name') }}" />
                <x-modals.input placeholder="{{ __('Name') }}" wire:model.defer="menu_name" id="menu_name" type="text" required />
                <x-modals.error for="menu_name" />
            </div>

            <div class="mb-2">
                <x-modals.label for="menu_url" value="{{ __('Url') }}" />
                <x-modals.input placeholder="{{ __('Url') }}" wire:model.defer="menu_url" id="menu_url" type="text" />
                <x-modals.error for="menu_url" />
            </div>

            <div class="mb-2" wire:ignore>
                <x-modals.label for="menu_type" value="{{ __('Type') }}" />
                <x-modals.select wire:model.defer="menu_type" name="menu_type" id="menu_type" placeholder="Type">
                    <option value="" selected hidden>Type Menu</option>
                    <option value="basic">Basic</option>
                    <option value="group">Group</option>
                    <option value="dropdown">Dropdown</option>
                </x-modals.select>
                <x-modals.error for="menu_type" />
            </div>

            <div class="mb-2" wire:ignore>
                <x-modals.label for="parent" value="{{ __('Parent') }}" />
                <x-modals.select wire:model.defer="parent_id" name="parent_id" id="parent" placeholder="Parent">
                    <option value="" selected hidden>Parent</option>
                    <option value="0">No Parent</option>
                    @foreach (App\Models\Menu::all() as $data)
                        <option value="{{ $data->id }}">{{ $data->menu_name }}</option>
                    @endforeach
                </x-modals.select>
                <x-modals.error for="parent_id" />
            </div>

            <div class="mb-2">
                <x-modals.label for="permission" value="{{ __('Permission') }}" />
                <x-modals.tags-input model="menu_permission" data="all"></x-modals.tags-input>
                <x-modals.error for="menu_permission" />
            </div>

            <div class="mb-2">
                <x-modals.label for="icon" value="{{ __('Icon') }}" />
                <x-modals.icons-input model="menu_icon"></x-modals.icons-input>
                <x-modals.error for="menu_icon" />
            </div>

            <div class="mb-2" wire:ignore>
                <x-modals.checkbox name="menu_active" wire:model.defer="menu_active" id="active" checked />
                <x-modals.label for="active" value="{{ __('Active?') }}" class="block text-gray-700 text-sm font-bold mb-2 inline-block" />
            </div>
            <div class="mt-5 sm:mt-6">
                <span class="flex w-full rounded-md shadow-sm">
                <button id="save" type="submit" @roleorpermision('Create Menu') @else disabled @endroleorpermision class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
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
