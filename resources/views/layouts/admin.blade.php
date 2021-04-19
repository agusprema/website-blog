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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>

<body class="font-family-karla flex-none md:flex bg-opacity-75 dark:bg-opacity-95 bg-gray-200 dark:bg-dark" id="body">
    <x-admins.navbar />

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <x-admins.header />

        <div class="w-full overflow-x-hidden flex flex-col">
            <main class="w-full flex-grow p-6">
                {{ $slot }}
            </main>

            <x-admins.footer />
        </div>

    </div>

    @stack('modals')

    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireScripts
    @stack('script')
</body>

</html>
