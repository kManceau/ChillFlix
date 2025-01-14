<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChillFlix</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
@include('layouts.nav')
@include('layouts.menu')
@yield('content')
</body>
</html>
