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
                <li><a href="{{ route('empleados.index') }}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{ request()->routeIs('empleados.*') ? 'active_custom' : '' }}"><i class="fas fa-users mr-2"></i> Empleados</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block py-2 px-20 rounded bg-red-600 hover:bg-red-800 text-white">
                            <i class="fas fa-sign-out-alt mr-2"></i> Salir
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 p-10">
            <h1 class="text-3xl font-bold mb-4">Lista de Empleados</h1>
            <a href="{{ route('empleados.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo Empleado</a>

            @if (session('success'))
                <div class="bg-green-500 text-white p-2 mb-4">{{ session('success') }}</div>
            @endif

            <div class="bg-white rounded-lg p-6 shadow">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3 text-left">ID Empleado</th>
                            <th class="p-3 text-left">Nombre Completo</th>
                            <th class="p-3 text-left">Puesto</th>
                            <th class="p-3 text-left">Salario</th>
                            <th class="p-3 text-left">Fecha Contratación</th>
                            <th class="p-3 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                            <tr class="border-b">
                                <td class="p-3">{{ $empleado->id_empleado }}</td>
                                <td class="p-3">{{ $empleado->nombre_empleado }}</td>
                                <td class="p-3">{{ $empleado->puesto }}</td>
                                <td class="p-3">${{ number_format($empleado->salario, 2) }}</td>
                                <td class="p-3">{{ $empleado->fecha_contratacion }}</td>
                                <td class="p-3">
                                    <a href="{{ route('empleados.edit', $empleado->id_empleado) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Editar</a>
                                    <form action="{{ route('empleados.destroy', $empleado->id_empleado) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" >Eliminar</button>
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
