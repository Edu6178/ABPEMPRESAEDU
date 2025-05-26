<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Distribuidora ABC') }}</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Fuente Nunito -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Archivos compilados -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Modo oscuro personalizado */
        .dark-mode {
            background-color: #121212 !important;
            color: #f0f0f0 !important;
        }

        .dark-mode .bg-white {
            background-color: #1e1e1e !important;
        }

        .dark-mode .text-gray-800 {
            color: #f0f0f0 !important;
        }

        .dark-mode .custom-footer {
            background-color: #222;
            color: #ccc;
        }
    </style>
</head>
<body id="main-body" class="bg-gray-100 text-gray-800">
    <div id="app">
        <!-- Botón de modo oscuro (puedes moverlo a un nav si lo deseas) -->
        <button onclick="toggleDarkMode()"
            class="fixed top-4 right-4 bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded shadow z-50">
            🌙 Modo Oscuro
        </button>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        function toggleDarkMode() {
            const body = document.getElementById('main-body');
            body.classList.toggle('dark-mode');
            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('modoOscuro', 'activado');
            } else {
                localStorage.setItem('modoOscuro', 'desactivado');
            }
        }

        // Activar modo oscuro automáticamente si estaba activado
        document.addEventListener('DOMContentLoaded', () => {
            if (localStorage.getItem('modoOscuro') === 'activado') {
                document.getElementById('main-body').classList.add('dark-mode');
            }
        });
    </script>
</body>
</html>
