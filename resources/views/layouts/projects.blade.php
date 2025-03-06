<!DOCTYPE html>
<html lang="en">
    <head>
    @vite('resources/js/app.js')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container position-relative">
    <h1 class="m-3 text-uppercase">
        @yield('title')
    </h1>
        @yield('content')
    </div>

</body>
</html>