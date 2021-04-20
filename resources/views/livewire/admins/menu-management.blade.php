@push('meta')
    <title>Menu Management | {{ config('app.name', 'Laravel') }}</title>
@endpush
<div>
    <div class="flex items-center">
        <x-admins.title-content>Menu Management</x-admins.title-content>
        <x-modals.trash-button />
        <livewire:modals.menus />
    </div>

    <div class="w-full mt-2">
        <livewire:datatable.menu-management />
    </div>
</div>

{{-- @push('script')
    <script src="{{ mix('js/vmenu.js') }}"></script>
@endpush
<div>
    <ol class="block relative list-none menu-drag" wire:sortable="updateMenuOrder" wire:sortable-group="updateMenuParentsOrder">
        @foreach ($menus->where('parent_id', 0) as $menu)
            <li wire:key="menu-{{ $menu->id }}" wire:sortable.item="{{ $menu->id }}">
                <div class="relative flex bg-green-200 mb-2 p-2" wire:sortable.handle>
                    @if ($menu->menu_type !== 'basic')
                        <div class="cursor-pointer flex-none w-7">
                            <i class="fa fa-minus"></i>
                        </div>
                    @endif
                    <div class="flex-grow">
                        <i class="{{ $menu->menu_icon }}"></i>
                        <span>{{ $menu->menu_name }}</span>
                    </div>
                </div>
                <ol class="block relative list-none menu-parents {{ $menu->menu_type !== 'basic' ? 'p-2 pl-10 border-dashed border-b-2 border-l-2 border-r-2 border-light-blue-500 mb-1' : '' }}" wire:sortable-group.item-group="{{ $menu->id }}">
                    @foreach ($menus->where('parent_id', $menu->id) as $parent)
                        <li class="block relative" wire:key="menu-parent-{{ $parent->id }}" wire:sortable-group.item="{{ $parent->id }}">
                            @if ($parent->menu_type !== 'basic')
                                <div class="cursor-pointer relative float-left p-2">
                                    <i class="fa fa-minus"></i>
                                </div>
                            @endif
                            <div>
                                <div class="bg-gray-200 block mb-2 p-2">
                                    <i class="{{ $parent->menu_icon }}"></i>
                                    <span wire:sortable.handle>{{ $parent->menu_name }}</span>
                                </div>
                            </div>

                            <ol class="block relative list-none menu-parents {{ $parent->menu_type !== 'basic' ? 'p-2 pl-10 border-dashed border-b-2 border-l-2 border-r-2 border-light-blue-500 mb-1' : '' }}" wire:sortable-group.item-group-parent="{{ $parent->id }}">
                                @foreach ($menus->where('parent_id', $parent->id) as $parent2)
                                    <li class="block relative" wire:key="menu-parent-{{ $parent2->id }}">
                                        @if ($parent2->menu_type !== 'basic')
                                            <div class="cursor-pointer relative float-left p-2">
                                                <i class="fa fa-minus"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="bg-gray-200 block mb-2 p-2">
                                                <i class="{{ $parent2->menu_icon }}"></i>
                                                <span wire:sortable.handle>{{ $parent2->menu_name }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </li>
                    @endforeach
                </ol>
            </li>
        @endforeach
    </ol>
</div> --}}
