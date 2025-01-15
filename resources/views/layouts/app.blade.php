<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChillFlix</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('styles')
</head>

<body>
@include('layouts.nav')
<div class="main-layout">
    @include('layouts.menu')
    <main id="main-content">
        @yield('content')
    </main>
</div>
</body>
</html>
