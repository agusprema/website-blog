<aside class="relative bg-light dark:bg-dark h-full md:h-screen w-full md:w-64 block shadow overflow-y-auto" x-data="{ isOpen: false }">
    <div class="p-1 md:p-2 md:p-4 flex md:flex-none">
        <div class="flex flex-grow md:justify-center">
            <a href="{{ url('/') }}" class="hover:opacity-75">
                <x-partials.logo class='h-8 md:h-16 w-8 md:w-16 bg-transparant rounded-lg' />
            </a>
        </div>
        <div x-data="{ isOpenAvatar: false }" class="relative flex justify-end ml-2 block md:hidden">
            <button @click="isOpenAvatar = !isOpenAvatar" class="realtive z-10 w-8 h-8 rounded-full overflow-hidden focus:border-gray-300 focus:outline-none">
                <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
            </button>
            <button x-show="isOpenAvatar" @click="isOpenAvatar = false" class="h-full w-full fixed inset-0 cursor-default"></button>
            <div x-show="isOpenAvatar" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-10">
                <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
            </div>
        </div>
        <button @click="isOpen = !isOpen" class="block md:hidden text-white text-2xl focus:outline-none ml-2">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>
    <nav :class="isOpen ? 'block md:hidden': 'hidden md:block'" class="text-white text-sm font-semibold pt-1">
        <div class="px-2 hidden md:block mb-3">
            <button class="w-full bg-primary font-semibold py-2 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Blog
            </button>
        </div>

        @foreach ($menus as $menu)
            @roleorpermision($menu->menu_permission)

            @if ($menu->menu_type == 'group' && $menu->parent_id == 0)
                <x-admins.navbaritems.group :submenus="$menu" />
                <x-partials.sidebar-dividar />
            @endif

            @if ($menu->menu_type == 'basic' && $menu->parent_id == 0)
                <x-admins.navbaritems.basic :submenus="$menu" />
                <x-partials.sidebar-dividar />
            @endif

            @if ($menu->menu_type == 'dropdown' && $menu->parent_id == 0)
                <x-admins.navbaritems.dropdown :submenus="$menu" />
                <x-partials.sidebar-dividar />
            @endif

            @endroleorpermision
        @endforeach
        </li>
    </nav>
</aside>
