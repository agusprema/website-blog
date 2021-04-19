<div>
    @php
        $active = 'false';
        if (count($submenus->children) > 0) {
            foreach ($submenus->children->pluck('menu_url') as $url) {
                request()->is($url) ? ($active = 'true') : '';
            }
        }
    @endphp
    <div @click.away="open = false" x-data="{ open: {{ $active }} }">
        <div class="nav-item flex py-4 pl-6 cursor-pointer hover:text-primary" @click="open = !open">
            <span class="flex flex-grow items-center">
                <i class="{{ $submenus->menu_icon }} mr-3"></i>{{ $submenus->menu_name }}
            </span>
            <span class="mr-4 self-center">
                <i :class="{'rotate-90': open, 'rotate-0': !open}" class="fas fa-chevron-right transition-transform duration-200 transform"></i>
            </span>
        </div>
        <div class="divide-y divide-gray-300 divide-opacity-50" x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
            @foreach ($submenus->children as $menuDropdown)
                @if (count($submenus->children) > 0)

                    @roleorpermision($menuDropdown->menu_permission)
                    @if ($menuDropdown->menu_type == 'group')
                        <x-admins.navbaritems.group :submenus="$menuDropdown" />
                    @endif

                    @if ($menuDropdown->menu_type == 'basic')
                        <x-admins.navbaritems.basic :submenus="$menuDropdown" />
                    @endif

                    @if ($menuDropdown->menu_type == 'dropdown')
                        <x-admins.navbaritems.dropdown :submenus="$menuDropdown" />
                    @endif
                    @endroleorpermision

                @endif
            @endforeach
        </div>
    </div>
</div>
