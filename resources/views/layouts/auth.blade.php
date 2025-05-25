<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Distribuidora ABC')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="text-bg-danger p-12"></div>

    <div class="min-h-screen flex">
        
        <!-- Barra lateral solo para usuarios autenticados -->
        <div class="w-80 bg-yellow-500 text-white p-10 space-y-6">
            <h1 class="text-2xl font-bold text-center">Distribuidora ABC</h1>
            <ul class="space-y-4">
                <h5 class="p-2">
                    <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{ request()->routeIs('dashboard') ? 'bg-yellow-700' : '' }}">
                        <i class="fa-solid fa-house-user"></i> Inicio
                    </a>
                </h5>
                <h5 class="p-2">
                    <a href="{{ route('productos') }}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{ request()->routeIs('productos') ? 'bg-yellow-700' : '' }}">
                        <i class="fa-solid fa-cart-shopping"></i> Productos
                    </a>
                </h5>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-yellow-700"><i class="fas fa-box mr-2"></i> Pedidos</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-yellow-700"><i class="fas fa-warehouse mr-2"></i> Catálogo</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-yellow-700"><i class="fa-solid fa-user"></i> Perfil</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-yellow-700"><i class="fa-solid fa-gear"></i> Configuración</a></li>
                
                <li>
                    <form method="POST" action="{{ route('Salir') }}">
                        @csrf
                        <button type="submit" class="block py-2 px-4 rounded bg-red-600 hover:bg-red-800 text-black">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Contenido dinámico -->
        <div class="flex-1 p-8">
            @yield('content')
        </div>

    </div>

</body>
</html>