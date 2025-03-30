<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Catalog App</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 flex">
        @yield('sidebar')
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>