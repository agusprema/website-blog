<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ MyWebsite::theme() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login Page | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
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
</head>

<body data-theme="{{ MyWebsite::theme() }}" class="bg-body">
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
</body>

</html>
