<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="companyLogo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@12.0.1/dist/sweetalert2.min.css">
    <title>Torrungruang</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    
    <!-- For POPUP -->
    @include('sweetalert::alert')


<div class="grid grid-cols-10 bg-content">
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@12.0.1/dist/sweetalert2.min.js"></script>
</body>
</html>
