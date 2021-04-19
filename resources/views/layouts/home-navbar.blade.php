<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ MyWebsite::theme() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('storage/asset/ico/apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('storage/asset/ico/apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('storage/asset/ico/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('storage/asset/ico/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ asset('storage/asset/ico/apple-touch-icon-60x60.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('storage/asset/ico/apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ asset('storage/asset/ico/apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('storage/asset/ico/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('storage/asset/ico/favicon-196x196.png') }}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ asset('storage/asset/ico/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ asset('storage/asset/ico/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('storage/asset/ico/favicon-16x16.png') }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('storage/asset/ico/favicon-128.png') }}" sizes="128x128" />
    <meta name="application-name" content="Box Tips" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ asset('storage/asset/ico/mstile-144x144.png') }}" />
    <meta name="msapplication-square70x70logo" content="{{ asset('storage/asset/ico/mstile-70x70.png') }}" />
    <meta name="msapplication-square150x150logo" content="{{ asset('storage/asset/ico/mstile-150x150.png') }}" />
    <meta name="msapplication-wide310x150logo" content="{{ asset('storage/asset/ico/mstile-310x150.png') }}" />
    <meta name="msapplication-square310x310logo" content="{{ asset('storage/asset/ico/mstile-310x310.png') }}" />

    @stack('meta')

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('head')
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
{{-- data-theme="dark" --}}

<body id="body" class="font-sans antialiased bg-light dark:bg-dark" data-theme="{{ MyWebsite::theme() }}">
    <x-jet-banner />

    <div class="min-h-screen" id="app">

        <!-- Page Heading -->
        <header class="bg-light dark:bg-dark shadow mb-4">
            <x-homes.navbar theme="{{ MyWebsite::theme() }}" />
        </header>

        <!-- Page Content -->
        <main class="mb-4">
            {{ $slot }}
        </main>

        <a class="border border-gray-400 bg-primary back-to-top" id="back-to-top" title="Back Too Top">
            <i class="fas fa-arrow-up"></i>
        </a>
        <x-homes.footer />
    </div>

    @stack('modals')
    @livewireScripts
    @stack('script')
    <script>
        // Hamburger Menu
        var NavbarButton = document.querySelector("#navbar-button");
        var NavbarMenu = document.querySelector("#navbar-menu");

        NavbarButton.onclick = () => {
            if (NavbarMenu.dataset.toggle == "colapsed") {
                NavbarMenu.classList.add("navbar-menu-active");
                NavbarMenu.dataset.toggle = "colapse";
            } else {
                NavbarMenu.dataset.toggle = "colapsed";
                NavbarMenu.classList.remove("navbar-menu-active");
            }
        };

        // Navbar Navigate button
        var TagNavigateLeft = document.querySelector("#tag-navigate-left");
        var TagNavigateRight = document.querySelector("#tag-navigate-right");
        var TagContainer = document.querySelector("#tag-container");

        TagNavigateLeft.onclick = () => {
            TagContainer.scrollLeft += -150;
        };

        TagNavigateRight.onclick = () => {
            TagContainer.scrollLeft += 150;
        };

        // Scrolling To Top
        var BackToTop = document.querySelector("#back-to-top");

        window.onscroll = () => {
            ShowBackToTopButton();
        };

        function ShowBackToTopButton() {
            document.body.scrollTop > 700 || document.documentElement.scrollTop > 700 ?
                (BackToTop.style.display = "block") :
                (BackToTop.style.display = "none");
        }

        BackToTop.onclick = (e) => {
            e.preventDefault();
            window.scroll({
                top: 0,
                behavior: "smooth"
            });
        };

    </script>
</body>

</html>
