{{-- resources/views/productos/show.blade.php --}}
@extends('layouts.app')

{{-- Puedes definir un título específico si tu layout lo permite --}}
{{-- @section('title', $producto->nombre . ' - Distribuidora ABC') --}}

@section('content')

{{-- Mantendremos tu estructura actual, incluyendo el DOCTYPE, head, body aquí --}}
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $producto->nombre }} - Detalles - Distribuidora ABC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Font Awesome para iconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" xintegrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-gray-100 font-sans">

<div class="text-bg-danger p-3 pt-4 w-100 position-absolute top-0 start-0"></div>

<div class="min-h-screen flex"> {{-- Ajusta pt-16 según la altura de tu franja superior --}}

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

    <div class="flex-1 p-6 md:p-10 bg-gray-100 overflow-y-auto">
        <div class="mb-6">
            <a href="{{ url()->previous(route('productos.index')) }}" class="text-yellow-600 hover:text-yellow-700 font-semibold inline-flex items-center group">
                <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform duration-150"></i>
                Volver
            </a>
        </div>

        <div class="bg-white rounded-lg p-6 md:p-8 shadow-xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8"> {{-- Cambiado a lg:grid-cols-2 para un layout más estándar --}}

                {{-- Columna de la Imagen --}}
                <div class="flex items-center justify-center">
                    @if($producto->imagen)
                        <img src="{{ asset('storage/'.$producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full max-w-lg h-auto max-h-[500px] object-contain rounded-lg shadow-md">
                    @else
                        <div class="w-full h-80 md:h-96 bg-gray-200 flex items-center justify-center rounded-lg shadow-md text-gray-400">
                            <svg class="w-24 h-24 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.158 0a.75.75 0 1 0-1.5 0 .75.75 0 0 0 1.5 0Z" /></svg>
                        </div>
                    @endif
                </div>

                {{-- Columna de Información del Producto --}}
                <div class="flex flex-col">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">{{ $producto->nombre }}</h1>

                    @if($producto->marca)
                        <p class="text-md text-gray-500 mb-4">Marca: <span class="font-semibold text-gray-700">{{ $producto->marca }}</span></p>
                    @endif

                    <p class="text-3xl font-bold text-blue-600 mb-6">${{ number_format($producto->precio, 2) }} <span class="text-lg font-normal text-gray-500">MXN</span></p>

                    {{-- Descripción General --}}
                    <div class="text-gray-700 mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2 border-b pb-1">Descripción General</h3>
                        <div class="mt-2 text-base leading-relaxed whitespace-pre-wrap break-words">
                            {!! nl2br(e($producto->descripcion)) !!}
                        </div>
                    </div>

                    {{-- Detalles Adicionales (Color y Material) --}}
                    @if($producto->color || $producto->material)
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2 border-b pb-1">Especificaciones</h3>
                            <dl class="mt-2 space-y-1 text-base">
                                @if($producto->color)
                                    <div class="flex">
                                        <dt class="font-medium text-gray-600 w-24 shrink-0">Color:</dt>
                                        <dd class="text-gray-800">{{ $producto->color }}</dd>
                                    </div>
                                @endif
                                @if($producto->material)
                                    <div class="flex">
                                        <dt class="font-medium text-gray-600 w-24 shrink-0">Material:</dt>
                                        <dd class="text-gray-800">{{ $producto->material }}</dd>
                                    </div>
                                @endif
                            </dl>
                        </div>
                    @endif

                    {{-- Características Adicionales --}}
                    @if($producto->caracteristicas_adicionales)
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2 border-b pb-1">Características Adicionales</h3>
                            <ul class="caracteristicas-lista text-base text-gray-700 leading-relaxed">
                                @foreach(explode("\n", $producto->caracteristicas_adicionales) as $caracteristica)
                                    @if(trim($caracteristica) != "")
                                        <li>{{ trim($caracteristica) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Botón de Editar --}}
                    <div class="mt-auto pt-6 border-t border-gray-200"> {{-- mt-auto para empujar al fondo si el contenido es corto --}}
                        <a href="{{ route('productos.edit', $producto->id) }}" class="w-full sm:w-auto inline-flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-6 rounded-lg text-center transition duration-150 shadow-md hover:shadow-lg">
                            <i class="fa-solid fa-pencil mr-2"></i> Editar este Producto
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sección de "Otros Productos" --}}
        @if(isset($otrosProductos) && $otrosProductos->count() > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">También te podría interesar:</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($otrosProductos as $otroProducto)
                        <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 flex flex-col overflow-hidden">
                            <a href="{{ route('productos.show', $otroProducto->id) }}" class="block group">
                                @if($otroProducto->imagen)
                                    <img src="{{ asset('storage/'.$otroProducto->imagen) }}" alt="{{ $otroProducto->nombre }}" class="w-full h-44 object-cover group-hover:opacity-80 transition-opacity">
                                @else
                                    <div class="w-full h-44 bg-gray-200 flex items-center justify-center text-gray-400 text-sm rounded-t-lg">
                                        <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.158 0a.75.75 0 1 0-1.5 0 .75.75 0 0 0 1.5 0Z" /></svg>
                                    </div>
                                @endif
                                <div class="p-4 flex-grow">
                                    <h3 class="text-md font-semibold text-gray-700 group-hover:text-yellow-600 mb-1 truncate" title="{{ $otroProducto->nombre }}">{{ $otroProducto->nombre }}</h3>
                                    <p class="text-sm text-gray-500 mb-2 min-h-[40px]">{{ Str::limit($otroProducto->descripcion, 60) }}</p>
                                </div>
                            </a>
                            <div class="p-4 border-t border-gray-100 mt-auto">
                                <p class="text-lg font-bold text-blue-600 mb-3">${{ number_format($otroProducto->precio, 2) }} MXN</p>
                                <a href="{{ route('productos.show', $otroProducto->id) }}" class="text-sm bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-3 rounded-md block text-center font-medium transition-colors">
                                    Ver Detalles
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

{{-- Footer como lo tenías --}}
<footer class="custom-footer">
    <p>© 2024 ABC Corp. Todos los derechos reservados.</p>
</footer>

</body>
</html>
@endsection
