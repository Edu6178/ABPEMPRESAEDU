@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Ciudad - Distribuidora ABC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Contenedor principal -->
    <div class="text-bg-danger p-3 pt-4 w-100 position-absolute top-0 start-0"></div>

    <div class="min-h-screen flex">

        <!-- Barra lateral (Sidebar) -->
        <div class="w-80 bg-yellow-500 text-white p-10 space-y-6 flex flex-col min-h-screen">
            <h1 class="text-2xl font-bold text-center">Distribuidora ABC</h1>
            <ul class="space-y-4">
                <li><a href="{{ url('dashboard') }}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{ request()->routeIs('home') ? 'active_custom' : '' }}"><i class="fa-solid fa-house-user"></i> Inicio</a></li>
                <li><a href="{{ url('productos') }}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{ request()->routeIs('productos') ? 'active_custom' : '' }}"><i class="fa-solid fa-cart-shopping"></i> Productos</a></li>
                <li><a href="{{ url('pedidos') }}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{ request()->routeIs('pedidos') ? 'active_custom' : '' }}"><i class="fas fa-box mr-2"></i> Pedidos</a></li>
                <li><a href="{{ url('catalogo') }}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{ request()->routeIs('catalogo') ? 'active_custom' : '' }}"><i class="fas fa-warehouse mr-2"></i> Catálogo</a></li>
                <li><a href="{{ url('perfil') }}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{ request()->routeIs('perfil') ? 'active_custom' : '' }}"><i class="fa-solid fa-user"></i> Perfil</a></li>
                <li><a href="{{ route('ciudades.index') }}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{ request()->routeIs('ciudades.*') ? 'active_custom' : '' }}"><i class="fas fa-city mr-2"></i> Ciudades</a></li>
                <li><a href="{{ route('empleados.index') }}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{ request()->routeIs('empleados.*') ? 'active_custom' : '' }}"><i class="fas fa-users mr-2"></i> Empleados</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block py-2 px-4 rounded bg-red-600 hover:bg-red-800 text-white">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 p-10">
            <h1 class="text-3xl font-bold mb-4">Nueva Ciudad</h1>

            @if (session('success'))
                <div class="bg-green-500 text-white p-2 mb-4">{{ session('success') }}</div>
            @endif

            <div class="bg-white rounded-lg p-6 shadow">
                <form action="{{ route('ciudades.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <label for="nombre_ciudad" class="block text-sm font-semibold text-gray-700">Nombre Ciudad</label>
                            <input type="text" name="nombre_ciudad" id="nombre_ciudad" class="w-full p-3 mt-1 border border-gray-300 rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="estado" class="block text-sm font-semibold text-gray-700">Estado</label>
                            <input type="text" name="estado" id="estado" class="w-full p-3 mt-1 border border-gray-300 rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="codigo_postal" class="block text-sm font-semibold text-gray-700">Código Postal</label>
                            <input type="text" name="codigo_postal" id="codigo_postal" class="w-full p-3 mt-1 border border-gray-300 rounded-lg" required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg">Guardar Ciudad</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <footer class="custom-footer">
        <p>© 2024 ABC Corp. Todos los derechos reservados.</p>
    </footer>

</body>
</html>

@endsection
