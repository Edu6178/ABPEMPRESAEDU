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
            <h1 class="text-3xl font-bold mb-4">Lista de Pedidos</h1>
            <p class="text-gray-600 mb-6">Tus pedidos.</p>

            <!-- Tabla de pedidos -->
            <div class="bg-white rounded-lg p-6 shadow">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3 text-left"># Pedido</th>
                            <th class="p-3 text-left">Cliente</th>
                            <th class="p-3 text-left">Estado</th>
                            <th class="p-3 text-left">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-3">001</td>
                            <td class="p-3">Eduardo Uriel</td>
                            <td class="p-3 text-green-600 font-semibold">Entregado</td>
                            <td class="p-3 text-blue-600">$1,500 MXN</td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3">002</td>
                            <td class="p-3">María López</td>
                            <td class="p-3 text-yellow-600 font-semibold">En proceso</td>
                            <td class="p-3 text-blue-600">$2,300 MXN</td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3">003</td>
                            <td class="p-3">Carlos Sánchez</td>
                            <td class="p-3 text-red-600 font-semibold">Cancelado</td>
                            <td class="p-3 text-red-600">$0 MXN</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div> <!-- Fin de la caja -->

    <footer class="custom-footer">
    <p>© 2024 ABC Corp. Todos los derechos reservados.</p>
</footer>

</body>
</html>


@endsection