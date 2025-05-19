@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Distribuidora ABC</title>
    <script src="https://cdn.tailwindcss.com"></script>


</head>
<body class="bg-gray-100 font-sans">

<!-- Contenedor principal -->
<div class="text-bg-danger p-3 pt-4 w-100 position-absolute top-0 start-0"></div>

{{-- Este div con clases de Bootstrap sigue aquí. Si no lo usas, puedes eliminarlo. --}}
{{-- Si lo usas, considera estilizarlo con Tailwind para consistencia. --}}
{{-- <div class="text-bg-danger p-3 pt-4 w-100 position-absolute top-0 start-0"></div> --}}

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
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <div class="flex-1 p-10 bg-gray-100"> {{-- bg-gray-100 ya estaba en tu body, lo pongo aquí para el contenido --}}
        <h1 class="text-3xl font-bold mb-4 text-gray-800">Lista de Productos</h1>
        <a href="{{ route('productos.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-6 inline-block shadow hover:shadow-lg transition-shadow">Nuevo Producto</a>

        @if (session('success'))
            {{-- Mensaje de éxito mejorado --}}
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow" role="alert">
                <p class="font-bold">Éxito</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"> {{-- Añadido xl:grid-cols-4 por si hay espacio --}}
            @foreach ($productos as $producto)
                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col">
                    {{-- ENLACE A LA PÁGINA DE DETALLE --}}
                    <a href="{{ route('productos.show', $producto->id) }}" class="block group flex-grow mb-4">
                        @if($producto->imagen)
                            <img src="{{ asset('storage/'.$producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-48 object-cover rounded mb-4 group-hover:opacity-75 transition-opacity duration-300">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded mb-4 text-gray-400">
                                Sin imagen
                            </div>
                        @endif
                        <h2 class="text-xl font-semibold text-gray-800 group-hover:text-yellow-600 transition-colors duration-300 mb-2">{{ $producto->nombre }}</h2>
                        <p class="text-gray-600 text-sm">{{ Str::limit($producto->descripcion, 80) }}</p> {{-- Límite un poco más corto para tarjetas --}}
                    </a>
                    {{-- FIN DEL ENLACE --}}

                    <div class="mt-auto"> {{-- Empuja precio y botones hacia abajo --}}
                        <p class="text-2xl font-bold text-blue-600 mb-4">${{ number_format($producto->precio, 2) }} MXN</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('productos.edit', $producto->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded text-xs sm:text-sm transition-colors">Editar</a>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded text-xs sm:text-sm transition-colors">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>


{{-- Tu footer, si lo mantienes en cada vista --}}
<footer class="custom-footer">
    <p>© 2024 ABC Corp. Todos los derechos reservados.</p>
</footer>

</body>
</html>

@endsection
