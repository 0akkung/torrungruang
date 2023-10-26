<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('storage/torrungruang-icon.png') }}">
    <title>Torrungruang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="grid grid-cols-10 bg-gray-100">
    @include('layouts.subviews.sidebar')
    <div class="col-span-8">
        <div>
            @include('layouts.subviews.header')
        </div>
        <main class="text-black min-h-screen px-16 py-24 overflow-hidden">
            @yield('content')
        </main>
    </div>
</div>

@include('layouts.subviews.footer')

</body>
</html>
