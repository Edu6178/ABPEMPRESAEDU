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
    <div class="text-bg-danger p-3 pt-4 w-100 position-absolute top-0 start-0 " ></div>

    <div class="min-h-screen flex">

        <!-- Barra lateral (Sidebar) -->
        <div class="w-80 bg-yellow-500 text-white p-10 space-y-6">
            <!-- Título de la barra lateral -->
            <h1 class="text-2xl font-bold text-center">Distribuidora ABC</h1>
            <!-- Menú de enlaces -->
            <ul class="space-y-4">
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-yellow-700"><i class="fa-solid fa-house-user"></i> Inicio</a></li>
                <li><a href="{{url('productos')}}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{request()->routeIs('productos') ? 'active_custom' : ''}}"><i class="fa-solid fa-cart-shopping"></i> Productos</a></li>
                <li><a href="{{url('pedidos')}}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{request()->routeIs('pedidos') ? 'active_custom' : ''}}"><i class="fas fa-box mr-2"></i> Pedidos</a></li>
                <li><a href="{{url('catalogo')}}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{request()->routeIs('catalogo') ? 'active_custom' : ''}}"><i class="fas fa-warehouse mr-2"></i> Catálogo</a></li>
                <li><a href="{{url('perfil')}}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{request()->routeIs('catalogo') ? 'active_custom' : ''}}"><i class="fa-solid fa-user"></i> Perfil</a></li>
                <li><a href="{{ route('ciudades.index') }}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{ request()->routeIs('ciudades.*') ? 'active_custom' : '' }}"><i class="fas fa-city mr-2"></i> Ciudades</a></li>
                <li><a href="{{ url('empleados') }}" class="block py-2 px-4 rounded hover:bg-yellow-700 {{ request()->is('empleados*') ? 'active_custom' : '' }}"> <i class="fas fa-users mr-2"></i> Empleados</a></li>



                <!-- Formulario de salirte (NO TOCAr) -->
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

        <!-- Contenido Principal -->
        <div class="flex-1 p-8">
            <!-- Tarjetas de información -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Tarjeta 1: Información sobre pedidos -->
                <div class="bg-white  rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800">Pedidos Pendientes</h2>
                    <p class="mt-2 text-gray-600">Revisa los pedidos que aún no han sido procesados.</p>
                    <p class="mt-4 text-2xl font-bold text-blue-600">15 pedidos</p>
                    <i class="fas fa-box text-blue-500 text-4xl mt-4"></i>
                </div>

                <!-- Tarjeta 2: Estado del Inventario -->
                <div class="bg-white rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800">Compras Hechas</h2>
                    <p class="mt-2 text-gray-600">2022 es tu año.</p>
                    <p class="mt-4 text-2xl font-bold text-green-600">350 productos ordenados </p>
                    <i class="fas fa-warehouse text-green-500 text-4xl mt-4"></i>
                </div>

                <!-- Tarjeta 3: Ventas recientes -->
                <div class="bg-white  rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800">Presupuesto establecido por usted</h2>
                    <p class="mt-2 text-gray-600">Presupuesto.</p>
                    <p class="mt-4 text-2xl font-bold text-yellow-600">15,200 MXN</p>
                    <i class="fas fa-shopping-cart text-yellow-500 text-4xl mt-4"></i>
                </div>


<div class="card" style="width: 18rem;">
<img src="{{ asset('img/cupon.png') }}" class="card-img-top " alt="...">
<div class="card-body">
    <h5 class="card-title">Felicidades!!</h5>
    <p class="card-text">Por comprar varios productos en una sola noche se te a recompensado con un descuento del 20% en tus 2 siguientes compras en las siguientes 4 horas!!</p>
    <a href="#" class="btn btn-primary">Reclamar cupon</a>
    <p class="text-gray"> Esta sujeta a Condiciones  </p>
</div>
</div>
            </div>
        </div>

    </div> <!---el final de la caja-->

    <footer class="custom-footer">
    <p>© 2024 ABC Corp. Todos los derechos reservados.</p>
</footer>
</body>
</html>
@endsection
