<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Usando la directiva Vite -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>MesaYa</title>
</head>
<body>

    <main class="py-6">
        {{ $slot }}
    </main>

    <script src="{{ asset('flowbite/dist/flowbite.min.js') }}"></script> <!-- Si flowbite es parte del bundle -->
</body>
</html>
