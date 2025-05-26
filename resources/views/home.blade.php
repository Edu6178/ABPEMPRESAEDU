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
                         <button type="submit" class="w-full flex items-center gap-2 py-2 px-4 rounded bg-red-500 hover:bg-red-600 text-black font-semibold transition duration-200">
                            <i class="fas fa-sign-out-alt mr-2"></i> Salir
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Contenido Principal -->
        <div class="flex-1 p-8">
            <!-- Tarjetas de información -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">






<!-- Barra de búsqueda y tarjeta de usuario -->
<div class="w-full max-w-4xl mx-auto">


        <!-- Formulario de búsqueda -->
            <form action="{{ url('productos') }}" method="GET" class="flex-grow flex">
                <input type="text" name="busqueda" value="{{ request('busqueda') }}" placeholder="Buscar producto"
                class="flex-grow p-4 rounded-l-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 shadow text-lg">
                    <button type="submit"
                        class="bg-yellow-500 text-white px-8 py-4 rounded-r-lg hover:bg-yellow-600 transition font-semibold text-lg">
                    Buscar
                </button>
            </form>

        <!-- Tarjeta de usuario -->
            <div class="bg-white shadow rounded-lg p-4 flex items-center space-x-4 min-w-[250px]">
                <div class="bg-yellow-500 text-white rounded-full h-12 w-12 flex items-center justify-center text-xl font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="text-gray-800 font-semibold">{{ Auth::user()->name }}</p>
                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                </div>
            </div>
    </div>
</div>

<!-- Sección de contenido interactivo -->
<div class="w-full max-w-6xl mx-auto mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">

 <div class="bg-white rounded-lg p-6 shadow hover:shadow-md transition">
        <h2 class="text-xl font-semibold text-gray-800">Pedidos Realizados</h2>
        <p class="mt-2 text-gray-600">Consulta tus pedidos ya entregados o finalizados.</p>
        <p class="mt-4 text-2xl font-bold text-green-600">27 pedidos</p>
        <i class="fas fa-truck text-green-500 text-4xl mt-4"></i>
    </div>

    <!-- Pedidos Pendientes -->
    <div class="bg-white rounded-lg p-6 shadow hover:shadow-md transition">
        <h2 class="text-xl font-semibold text-gray-800"> Pedidos Pendientes</h2>
        <p class="mt-2 text-gray-600">Revisa los pedidos que aún no han sido procesados.</p>
        <p class="mt-4 text-2xl font-bold text-blue-600">15 pedidos</p>
        <i class="fas fa-box text-blue-500 text-4xl mt-4"></i>
    </div>
</div>

<!-- 3. Ofertas Interactivas (REUBICADAS ABAJO) -->
<div class="w-full max-w-6xl mx-auto mt-10">
    <div class="bg-yellow-100 rounded-lg p-6 hover:shadow-lg transition">
        <h2 class="text-2xl font-semibold text-yellow-800">Ofertas Especiales</h2>
        <p class="mt-2 text-yellow-700">Aprovecha descuentos exclusivos por tiempo limitado.</p>

        <!-- Oferta destacada -->
        <div class="mt-4 bg-white p-4 rounded shadow-md hover:bg-yellow-50 transition cursor-pointer">
            <h3 class="text-lg font-bold text-gray-800">20% de descuento en tu próximo pedido</h3>
            <p class="text-gray-600">Oferta disponible después de haber hecho 20 compras.</p>
        </div>

        <!-- Otra oferta -->
        <div class="mt-4 bg-white p-4 rounded shadow-md hover:bg-yellow-50 transition cursor-pointer">
            <h3 class="text-lg font-bold text-gray-800">2x1 en paquetes de lápices</h3>
            <p class="text-gray-600">Oferta disponible en compras mayores a $50.</p>
        </div>
    </div>
</div>

<!-- 4. Cupón Promocional -->
<div class="w-full max-w-6xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-md flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-8">
    <!-- Imagen del cupón -->
    <div class="w-full md:w-1/3">
        <img src="{{ asset('img/cupon.png') }}" alt="Cupón Descuento" class="rounded-lg w-full object-cover">
    </div>

    <!-- Texto e información -->
    <div class="w-full md:w-2/3">
        <h2 class="text-2xl font-bold text-gray-800 mb-2"> ¡Felicidades!</h2>
        <p class="text-gray-700 mb-4">
            Por comprar varios productos en una sola noche, se te ha recompensado con un <strong>descuento del 20%</strong> en tus 2 siguientes compras durante las próximas 4 horas.
        </p>
        <a href="#" class="inline-block bg-yellow-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-yellow-600 transition">
            Reclamar cupón
        </a>
        <p class="text-sm text-gray-500 mt-2">* Esta promoción está sujeta a condiciones.</p>
    </div>
</div>


    </div> <!---el final de la caja-->

    <footer class="custom-footer">
    <p>© 2024 ABC Corp. Todos los derechos reservados.</p>
</footer>

</body>

<!-- CDN de Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</html>
@endsection
