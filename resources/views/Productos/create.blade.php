@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Producto - Distribuidora ABC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Font Awesome para los iconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" xintegrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-gray-100 font-sans">

<!-- Contenedor principal -->
<div class="text-bg-danger p-3 pt-4 w-100 position-absolute top-0 start-0"></div>


<div class="min-h-screen flex ">

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

    <div class="flex-1 p-6 md:p-10 bg-gray-100 overflow-y-auto">
        <h1 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800">Crear Nuevo Producto</h1>

        <div class="bg-white rounded-xl shadow-xl p-6 md:p-8">
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Información Básica del Producto --}}
                <fieldset>
                    <legend class="text-xl font-semibold text-gray-700 mb-4 border-b border-gray-200 pb-2">Información Básica</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mb-6">
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre del Producto <span class="text-red-500">*</span></label>
                            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 placeholder-gray-400" required placeholder="Ej: Lápiz HB #2">
                            @error('nombre') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">Precio (MXN) <span class="text-red-500">*</span></label>
                            <input type="number" step="0.01" min="0" name="precio" id="precio" value="{{ old('precio') }}" class="w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 placeholder-gray-400" required placeholder="Ej: 25.50">
                            @error('precio') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción Corta <span class="text-red-500">*</span></label>
                            <textarea name="descripcion" id="descripcion" rows="3" class="w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 placeholder-gray-400" required placeholder="Una breve descripción del producto para listados y tarjetas...">{{ old('descripcion') }}</textarea>
                            @error('descripcion') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="imagen" class="block text-sm font-medium text-gray-700 mb-1">Imagen Principal</label>
                            <input type="file" name="imagen" id="imagen" class="w-full text-sm text-gray-500 mt-1 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200 file:cursor-pointer focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                            @error('imagen') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </fieldset>

                {{-- Detalles y Características Adicionales --}}
                <fieldset class="mt-8">
                    <legend class="text-xl font-semibold text-gray-700 mb-4 border-b border-gray-200 pb-2">Detalles Adicionales</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mb-6">
                        <div>
                            <label for="marca" class="block text-sm font-medium text-gray-700 mb-1">Marca</label>
                            <input type="text" name="marca" id="marca" value="{{ old('marca') }}" class="w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 placeholder-gray-400" placeholder="Ej: Scribe, Maped, BIC">
                            @error('marca') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                            <input type="text" name="color" id="color" value="{{ old('color') }}" class="w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 placeholder-gray-400" placeholder="Ej: Rojo, Azul, Surtido, Negro">
                            @error('color') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="material" class="block text-sm font-medium text-gray-700 mb-1">Material Principal</label>
                            <input type="text" name="material" id="material" value="{{ old('material') }}" class="w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 placeholder-gray-400" placeholder="Ej: Plástico, Madera, Metal, Papel">
                            @error('material') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        {{-- Puedes añadir más campos aquí como SKU, dimensiones, peso, etc. --}}
                        {{-- Ejemplo:
                        <div>
                            <label for="sku" class="block text-sm font-medium text-gray-700 mb-1">SKU (Código)</label>
                            <input type="text" name="sku" id="sku" value="{{ old('sku') }}" class="w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 placeholder-gray-400" placeholder="Ej: PROD-00123-XYZ">
                            @error('sku') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        --}}

                        <div class="md:col-span-2">
                            <label for="caracteristicas_adicionales" class="block text-sm font-medium text-gray-700 mb-1">Características Adicionales (una por línea)</label>
                            <textarea name="caracteristicas_adicionales" id="caracteristicas_adicionales" rows="5" class="w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 placeholder-gray-400" placeholder="Ej:&#10;- Punta extra resistente de grafito&#10;- No tóxico, seguro para niños&#10;- Incluye borrador que no mancha&#10;- Cuerpo hexagonal para mejor agarre">{{ old('caracteristicas_adicionales') }}</textarea>
                            @error('caracteristicas_adicionales') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </fieldset>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('productos.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-medium border border-gray-300 transition-colors">Cancelar</a>
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2.5 rounded-lg text-sm font-medium shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all">
                        <i class="fa-solid fa-save mr-2"></i>Guardar Producto
                    </button>
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
