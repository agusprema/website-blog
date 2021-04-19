<div class="text-dark dark:text-light py-2 pl-3">
    <p class="uppercase text-sm tracking-wider">{{ $submenus->menu_name }}</p>

    <div class="divide-y divide-gray-300 divide-opacity-50">
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
