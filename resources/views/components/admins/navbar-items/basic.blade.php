<div>
    @roleorpermision($submenus->menu_permission)
    <a href="{{ $submenus->menu_url ? url($submenus->menu_url) : '#' }}" class="flex items-center hover:text-primary dark:hover:text-primary text-dark dark:text-light py-4 pl-6 nav-item {{ request()->is($submenus->menu_url) ? 'active-nav-link' : '' }}">
        <i class="{{ $submenus->menu_icon }} mr-3"></i>
        {{ $submenus->menu_name }}
    </a>
    @endroleorpermision
</div>
