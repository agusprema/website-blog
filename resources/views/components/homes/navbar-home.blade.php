<nav class="flex items-center justify-between flex-wrap shadow">
    <div class="container mx-auto p-2">
        <div class="flex items-center flex-shrink-0 text-primary mb-1">
            <div class="flex flex-grow">
                {{-- <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
                </svg> --}}
                <x-partials.logo class='h-8 w-8 mr-2' />
                <span class="font-semibold text-xl tracking-tight mr-1">{{ config('app.name', 'Laravel') }}</span>
                {{-- <span class="text-xs mr-2 text-fifthly opacity-50">ID</span> --}}
            </div>
            <div class="ml-3">
                <x-partials.switch-theme />
            </div>
            @if (Auth::check())
                <div class="ml-3">
                    <div class="relative">
                        <x-partials.avatar-user-dropdown />
                    </div>
                </div>
            @endif
            <div class="block lg:hidden flex flex-row-reverse ml-3">
                <button id="navbar-button" class="flex items-center px-3 py-2 border rounded text-primary border-teal-500">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="navbar-menu" data-toggle="colapsed" class="w-full flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-md lg:flex-grow">
                <a href="{{ url('/') }}" class="navbar-items font-bold transition duration-500 ease-in-out lg:inline-block lg:mt-0 active hover:text-primary dark:hover:text-primary text-dark dark:text-light">
                    Home
                </a>
                <a href="#responsive-header" class="navbar-items font-bold transition duration-500 ease-in-out lg:inline-block lg:mt-0 hover:text-primary dark:hover:text-primary text-dark dark:text-light">
                    News
                </a>
                <a href="#responsive-header" class="navbar-items font-bold transition duration-500 ease-in-out lg:inline-block lg:mt-0 hover:text-primary dark:hover:text-primary text-dark dark:text-light">
                    Bisnis
                </a>
                <a href="#responsive-header" class="navbar-items font-bold transition duration-500 ease-in-out lg:inline-block lg:mt-0 hover:text-primary dark:hover:text-primary text-dark dark:text-light">
                    Tekno
                </a>
                <a href="#responsive-header" class="navbar-items font-bold transition duration-500 ease-in-out lg:inline-block lg:mt-0 hover:text-primary dark:hover:text-primary text-dark dark:text-light">
                    Bola
                </a>
                <a href="#responsive-header" class="navbar-items font-bold transition duration-500 ease-in-out lg:inline-block lg:mt-0 hover:text-primary dark:hover:text-primary text-dark dark:text-light">
                    Hot
                </a>
            </div>
            @if (!Auth::check())
                <div class="">
                    <a href="{{ route('login') }}" class="navbar-items font-bold transition duration-500 ease-in-out lg:inline-block lg:mt-0 hover:text-primary dark:hover:text-primary text-dark dark:text-light">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="navbar-items font-bold transition duration-500 ease-in-out lg:inline-block lg:mt-0 hover:text-primary dark:hover:text-primary text-dark dark:text-light">
                        Sign Up
                    </a>
                </div>
            @endif
            <div class="relative mt-4 lg:mt-0">
                <input type="search" name="s" id="search" placeholder="Search News" class="search-input py-1 px-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent border-primary border-opacity-25 w-full rounded-lg border-2 bg-body" size="40">
                <button type="submit" class="search-button absolute mt-2 mr-3 right-0 top-0 border-primary border-opacity-25 text-primary" id="search-button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

    </div>
    <div class="bg-primary w-full p-2">
        <div class="container mx-auto">
            <x-homes.tag-navbar />
        </div>
    </div>
</nav>
