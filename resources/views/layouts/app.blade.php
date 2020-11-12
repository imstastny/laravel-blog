<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='/css/bootstrap.min.css'>
    <title>@yield('title')</title>
</head>
<body>
    @include('layouts.navigation')
    <div class="py-4">
       <div class="container">
            @yield('content')
        </div>
    </div>
</body>
</html>