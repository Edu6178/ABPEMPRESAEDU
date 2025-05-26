@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto: {{ $producto->nombre }} - Distribuidora ABC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Font Awesome para los iconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" xintegrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body class="bg-gray-100 font-sans">

{{-- ESTA ES TU FRANJA ROJA SUPERIOR ORIGINAL --}}
<div class="text-bg-danger p-3 pt-4 w-100 position-absolute top-0 start-0"></div>

{{-- ESTE ES TU CONTENEDOR PRINCIPAL ORIGINAL --}}
{{-- El padding-top (pt-16) es para compensar la altura de la franja superior si es position:absolute --}}
<div class="min-h-screen flex ">

    {{-- ESTA ES TU BARRA LATERAL ORIGINAL --}}
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
    {{-- ESTA ES TU ÁREA DE CONTENIDO PRINCIPAL ORIGINAL --}}
    <div class="flex-1 p-10 bg-gray-100 overflow-y-auto">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">Editar Producto: <span class="text-yellow-600">{{ $producto->nombre }}</span></h1>

        @if (session('success'))
            {{-- Mensaje de éxito como lo tenías en tu edit.blade.php original --}}
            <div class="bg-green-500 text-white p-2 mb-4 rounded-md">{{ session('success') }}</div>
        @endif

        {{-- Contenedor del formulario, manteniendo tu estilo original de .rounded-lg .p-6 .shadow --}}
        <div class="bg-white rounded-lg p-6 shadow">
            <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Grid para los campos del formulario, como en tu edit.blade.php original --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Nombre del Producto --}}
                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-semibold text-gray-700">Nombre del Producto</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" class="w-full p-3 mt-1 border border-gray-300 rounded-lg placeholder-gray-400 focus:ring-yellow-500 focus:border-yellow-500" required>
                        @error('nombre') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    {{-- Precio --}}
                    <div class="mb-4">
                        <label for="precio" class="block text-sm font-semibold text-gray-700">Precio</label>
                        <input type="number" step="0.01" min="0" name="precio" id="precio" value="{{ old('precio', $producto->precio) }}" class="w-full p-3 mt-1 border border-gray-300 rounded-lg placeholder-gray-400 focus:ring-yellow-500 focus:border-yellow-500" required>
                        @error('precio') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    {{-- Descripción Corta --}}
                    <div class="mb-4 md:col-span-2">
                        <label for="descripcion" class="block text-sm font-semibold text-gray-700">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="3" class="w-full p-3 mt-1 border border-gray-300 rounded-lg placeholder-gray-400 focus:ring-yellow-500 focus:border-yellow-500" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                        @error('descripcion') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    {{-- Imagen Principal --}}
                    <div class="mb-4">
                        <label for="imagen" class="block text-sm font-semibold text-gray-700">Imagen (opcional)</label>
                        {{-- Input de archivo con el estilo que tenías originalmente --}}
                        <input type="file" name="imagen" id="imagen" class="w-full p-3 mt-1 border border-gray-300 rounded-lg">
                        @if ($producto->imagen)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$producto->imagen) }}" alt="Imagen actual del producto" class="w-32 h-32 object-cover rounded-md border">
                            </div>
                        @endif
                        @error('imagen') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    {{-- AQUÍ SE AÑADEN LOS NUEVOS CAMPOS, DENTRO DEL MISMO GRID --}}
                    {{-- Marca --}}
                    <div class="mb-4">
                        <label for="marca" class="block text-sm font-semibold text-gray-700">Marca</label>
                        <input type="text" name="marca" id="marca" value="{{ old('marca', $producto->marca) }}" class="w-full p-3 mt-1 border border-gray-300 rounded-lg placeholder-gray-400 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Ej: Scribe, Maped">
                        @error('marca') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    {{-- Color --}}
                    <div class="mb-4">
                        <label for="color" class="block text-sm font-semibold text-gray-700">Color</label>
                        <input type="text" name="color" id="color" value="{{ old('color', $producto->color) }}" class="w-full p-3 mt-1 border border-gray-300 rounded-lg placeholder-gray-400 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Ej: Rojo, Azul">
                        @error('color') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    {{-- Material Principal --}}
                    <div class="mb-4"> {{-- Si este campo queda solo en una fila en md, puedes añadir md:col-span-2 si quieres que ocupe todo el ancho --}}
                        <label for="material" class="block text-sm font-semibold text-gray-700">Material Principal</label>
                        <input type="text" name="material" id="material" value="{{ old('material', $producto->material) }}" class="w-full p-3 mt-1 border border-gray-300 rounded-lg placeholder-gray-400 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Ej: Plástico, Madera">
                        @error('material') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    {{-- Características Adicionales (ocupa todo el ancho en md) --}}
                    <div class="mb-4 md:col-span-2">
                        <label for="caracteristicas_adicionales" class="block text-sm font-semibold text-gray-700">Características Adicionales (una por línea)</label>
                        <textarea name="caracteristicas_adicionales" id="caracteristicas_adicionales" rows="5" class="w-full p-3 mt-1 border border-gray-300 rounded-lg placeholder-gray-400 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Ej:&#10;- Punta resistente&#10;- No tóxico&#10;- Incluye borrador">{{ old('caracteristicas_adicionales', $producto->caracteristicas_adicionales) }}</textarea>
                        @error('caracteristicas_adicionales') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Botón de Actualizar, manteniendo tu estilo original del edit.blade.php --}}
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg text-sm font-medium shadow-md hover:shadow-lg transition-all">
                        <i class="fa-solid fa-sync-alt mr-2"></i>Actualizar Producto
                    </button>
                    {{-- Si tenías un botón de cancelar y quieres mantenerlo: --}}
                    {{-- <a href="{{ route('productos.index') }}" class="ml-3 bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded-lg text-sm font-medium border border-gray-300">Cancelar</a> --}}
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ESTE ES TU FOOTER ORIGINAL --}}
<footer class="custom-footer">
    <p>© 2024 ABC Corp. Todos los derechos reservados.</p>
</footer>

</body>
</html>

@endsection
