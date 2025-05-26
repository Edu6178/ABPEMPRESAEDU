@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - Distribuidora ABC</title> {{-- Título específico para el catálogo --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Font Awesome si usas los iconos en la sidebar --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" xintegrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-gray-100 font-sans">

{{-- Esta es la franja que tenías en productos/index.blade.php. Si es roja, asegúrate que las clases Bootstrap text-bg-danger estén definidas o usa Tailwind. --}}
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
                    <button type="submit" class="block py-2 px-20 rounded bg-red-600 hover:bg-red-800 text-white">
                        <i class="fas fa-sign-out-alt mr-2"></i> Salir
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <div class="flex-1 p-10 bg-gray-100 overflow-y-auto">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">Catálogo de Productos</h1>
        <p class="text-gray-600 mb-8">Explora nuestro catálogo de productos disponibles.</p> {{-- Párrafo introductorio --}}

        @if(isset($productos) && $productos->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($productos as $producto)
                    <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col">
                        {{-- ENLACE A LA PÁGINA DE DETALLE --}}
                        <a href="{{ route('productos.show', $producto->id) }}" class="block group flex-grow mb-4">
                            @if($producto->imagen)
                                <img src="{{ asset('storage/'.$producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-48 object-cover rounded mb-4 group-hover:opacity-75 transition-opacity duration-300">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded mb-4 text-gray-400">
                                    Sin imagen {{-- Placeholder simple como en tu productos/index --}}
                                </div>
                            @endif
                            <h2 class="text-xl font-semibold text-gray-800 group-hover:text-yellow-600 transition-colors duration-300 mb-2 truncate" title="{{ $producto->nombre }}">
                                {{ $producto->nombre }}
                            </h2>
                            <p class="text-gray-600 text-sm min-h-[40px]"> {{-- min-h para intentar alinear un poco las tarjetas --}}
                                {{ Str::limit($producto->descripcion, 80) }} {{-- Límite de descripción como en productos/index --}}
                            </p>
                        </a>
                        {{-- FIN DEL ENLACE --}}

                        <div class="mt-auto"> {{-- Empuja precio y botón "Ver Detalles" hacia abajo --}}
                            <p class="text-2xl font-bold text-blue-600 mb-4">${{ number_format($producto->precio, 2) }} MXN</p>
                            <div class="flex justify-center items-center"> {{-- Centrar el botón "Ver Detalles" --}}
                                <a href="{{ route('productos.show', $producto->id) }}" class="w-full sm:w-auto bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded text-sm text-center transition-colors duration-300">
                                    Ver Detalles
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Si usaste paginación en CatalogoController ($productos = Producto::paginate(X);), descomenta esto: --}}
            {{-- <div class="mt-8">
                {{ $productos->links() }}
            </div> --}}

        @else
            <div class="text-center py-10">
                <p class="text-xl text-gray-500">No hay productos disponibles en el catálogo en este momento.</p>
            </div>
        @endif
    </div>

</div> {{-- Fin de min-h-screen flex --}}

{{-- Footer como en tu productos/index.blade.php --}}
<footer class="custom-footer">
    <p>© 2024 ABC Corp. Todos los derechos reservados.</p>
</footer>

</body>
</html>

@endsection
