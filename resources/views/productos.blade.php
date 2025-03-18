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
<body class="bg-gray-100">

<!-- Contenedor principal -->
<div class="text-bg-danger p-3 pt-4 w-100 position-absolute top-0 start-0"></div>

<div class="min-h-screen flex">

        <!-- Barra lateral (Sidebar) -->
        <div class="w-80 bg-yellow-500 text-white p-10 space-y-6 flex flex-col min-h-screen">

            <!-- Título de la barra lateral -->
            <h1 class="text-2xl font-bold text-center">Distribuidora ABC</h1>
            <!-- Menú de enlaces -->


            <ul class="space-y-4">
                <li><a href="{{url('dashboard')}}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{request()->routeIs('home') ? 'active_custom' : ''}}"><i class="fa-solid fa-house-user"></i> Inicio</a></li>
                <li><a href="{{url('productos')}}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{request()->routeIs('productos') ? 'active_custom' : ''}}"><i class="fa-solid fa-cart-shopping"></i> Productos</a></li>
                <li><a href="{{url('pedidos')}}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{request()->routeIs('pedidos') ? 'active_custom' : ''}}"><i class="fas fa-box mr-2"></i> Pedidos</a></li>
                <li><a href="{{url('catalogo')}}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{request()->routeIs('catalogo') ? 'active_custom' : ''}}"><i class="fas fa-warehouse mr-2"></i> Catálogo</a></li>
                <li><a href="{{url('perfil')}}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{request()->routeIs('catalogo') ? 'active_custom' : ''}}"><i class="fa-solid fa-user"></i> Perfil</a></li>


                <!-- Botón de logout -->
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
            <h1 class="text-3xl font-bold mb-4">Lista de Productos</h1>
            <p class="text-gray-600 mb-6">Aquí puedes ver los productos disponibles en nuestros Almacenes.</p>

            <!-- Grid de productos -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg p-6 shadow">
            <img src="img/p_lapices.jpg" alt="Producto 1" class="w-full h-48 object-cover rounded">
            <h2 class="text-xl font-semibold text-gray-800">Lapices</h2>
            <p class="mt-2 text-gray-600">Resistentes y excelente punta (Paquete de 120 piezas).</p>
            <p class="mt-4 text-2xl font-bold text-blue-600">$500 MXN</p>
            </div>


                <div class="bg-white rounded-lg p-6 shadow">
                <img src="img/p_libreta.jpg" alt="Producto 2" class="w-full h-48 object-cover rounded">
                    <h2 class="text-xl font-semibold text-gray-800">Libretas Raya</h2>
                    <p class="mt-2 text-gray-600">Libretas Marca Scribe de 65 piezas.</p>
                    <p class="mt-4 text-2xl font-bold text-green-600">$750 MXN</p>
                </div>


                <div class="bg-white rounded-lg p-6 shadow">
                <img src="{{ asset('img/p_pluma.jpg') }}" alt="Producto 5" class="w-full h-48 object-cover rounded">
                    <h2 class="text-xl font-semibold text-gray-800">Boligrafos de Color Rojo Verde Azul y Negro</h2>
                    <p class="mt-2 text-gray-600">Paquete de Boligrafos (50 piezas por paquete).</p>
                    <p class="mt-4 text-2xl font-bold text-yellow-600">$249 MXN</p>
                </div>
            </div>
        </div>

    </div> <!-- Fin de la caja -->
    
    <footer class="custom-footer">
    <p>© 2024 ABC Corp. Todos los derechos reservados.</p>
</footer>

</body>
</html>



@endsection
