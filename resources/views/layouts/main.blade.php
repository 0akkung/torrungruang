<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('storage/torrungruang-icon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@12.0.1/dist/sweetalert2.min.css">
    <title>Torrungruang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <!-- For POPUP -->
    @include('sweetalert::alert')


    <div>
        <div>
            @include('layouts.subviews.header')
        </div>
        <div class="grid grid-cols-10 bg-gray-100">
            @include('layouts.subviews.sidebar')
            <div class="col-span-8">
                <h1 class="text-5xl py-12 font-bold text-center text-white">
                    <!-- <a href="/">Torrungruang</a> -->
                </h1>
                <div class="self-center text-md font-semibold whitespace-nowrap text-black px-4">
                    Factory Office System
                    @if (isset($title))
                    <span class="text-gray-400"> > {{ $title }}</span>
                    @endif
                </div>
                <main class="text-black min-h-screen px-16 py-24 overflow-hidden">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    @include('layouts.subviews.footer')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@12.0.1/dist/sweetalert2.min.js"></script>
</body>

</html>
