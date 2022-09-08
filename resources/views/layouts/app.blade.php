<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js' ,'resources/js/userLocation.js'])

    <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"
        integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="font-sans antialiased bg-[#F7F7F7]">
    @include('layouts.navigation')
    <!-- Page Heading -->
    @yield('content')
    <!-- Page Content -->

    <div class=" bottom-0 flex items-center justify-center">
        <span class="text-base text-center justify-center capitalize font-sans  text-gray-500">© 2022 <a
                href="https://www.facebook.com/APsoft.co" class="text-indigo-800 font-semibold">apsoft</a>, All Rigths
            Recerved</span>
    </div>
</body>

</html>
