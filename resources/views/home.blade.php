<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChillFlix</title>
{{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-white text-xl font-bold">ChillFlix</a>
        <div class="hidden md:flex space-x-4">
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Services</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
        </div>
        <div class="md:hidden">
            <button class="text-gray-300 hover:text-white focus:outline-none focus:text-white">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>
</body>
</html>
