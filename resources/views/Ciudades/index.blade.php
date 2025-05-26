@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Distribuidora ABC</title>
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
                <li><a href="{{ url('empleados') }}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{ request()->is('empleados*') ? 'active_custom' : '' }}"> <i class="fas fa-users mr-2"></i> Empleados</a></li>



                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block py-2 px-4 rounded bg-red-600 hover:bg-red-800 text-white">
                            <i class="fas fa-sign-out-alt mr-2"></i> Salir
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 p-10">
            <h1 class="text-3xl font-bold mb-4">Lista de Ciudades</h1>
            <a href="{{ route('ciudades.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nueva Ciudad</a>

            @if (session('success'))
                <div class="bg-green-500 text-white p-2 mb-4">{{ session('success') }}</div>
            @endif

            <div class="bg-white rounded-lg p-6 shadow">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3 text-left">ID Ciudad</th>
                            <th class="p-3 text-left">Nombre Ciudad</th>
                            <th class="p-3 text-left">Estado</th>
                            <th class="p-3 text-left">Código Postal</th>
                            <th class="p-3 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ciudades as $ciudad)
                            <tr class="border-b">
                                <td class="p-3">{{ $ciudad->id_ciudad }}</td>
                                <td class="p-3">{{ $ciudad->nombre_ciudad }}</td>
                                <td class="p-3">{{ $ciudad->estado }}</td>
                                <td class="p-3">{{ $ciudad->codigo_postal }}</td>
                                <td class="p-3">
                                    <a href="{{ route('ciudades.edit', $ciudad->id_ciudad) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Editar</a>
                                    <form action="{{ route('ciudades.destroy', $ciudad->id_ciudad) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('¿Seguro que deseas eliminar esta ciudad?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <footer class="custom-footer">
        <p>© 2024 ABC Corp. Todos los derechos reservados.</p>
    </footer>

</body>
</html>

@endsection
