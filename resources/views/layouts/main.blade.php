<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Torrungruang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div id="content-layout"
      class="grid grid-cols-10 bg-gray-100 overflow-hidden min-h-screen ">

    @include('layouts.subviews.sidebar')
    <div class="col-span-8">
        <main class="p-4 text-black min-h-screen">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
