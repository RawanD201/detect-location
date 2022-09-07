<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js' ,'resources/js/userLocation.js'])
</head>

<body class="font-sans antialiased bg-[#F7F7F7]"">
    <div class=" font-sans text-gray-900 antialiased">
    {{ $slot }}
    </div>

    <div class=" bottom-0 flex items-center justify-center">
        <span class="text-base text-center justify-center capitalize font-sans  text-gray-500">© 2022 <a
                href="https://www.facebook.com/APsoft.co" class="text-[#1A3A7C] font-semibold">apsoft</a>, All Rigths
            Recerved</span>
    </div>
</body>

</html>
