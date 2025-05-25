@extends('layouts.app')

@section('content')
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-yellow-500 px-6 py-4 shadow-md">
    <div class="flex justify-between items-center">
        <div class="text-white text-xl font-bold">Distribuidora ABC</div>
        <ul class="flex space-x-4">
            <li><a href="{{ route('register') }}" class="text-white font-medium hover:underline">Registrarse</a></li>
            <li><a href="{{ route('login') }}" class="text-white font-medium hover:underline">Iniciar Sesión</a></li>
            <li class="relative group">
                <button class="text-white font-medium">Categorías ▾</button>
                <ul class="absolute hidden group-hover:block bg-white text-black mt-2 rounded shadow-lg">
                    <li><a href="#" class="block px-4 py-2 hover:bg-yellow-100">Plumas</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-yellow-100">Libretas</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-yellow-100">Lápices</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-yellow-100">Mochilas</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-yellow-100">Pegamentos</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- Slider -->
<div class="container mx-auto mt-6">
    <div class="relative w-full max-w-4xl mx-auto overflow-hidden rounded-lg shadow-lg">
        <div class="carousel">
            <div class="carousel-item active"><img src="{{ asset('img/p_pluma.jpg') }}" class="w-full object-cover h-72"></div>
            <div class="carousel-item"><img src="{{ asset('img/PapelMultiusos.jpg') }}" class="w-full object-cover h-72"></div>
            <div class="carousel-item"><img src="{{ asset('img/p_lapices.jpg') }}" class="w-full object-cover h-72"></div>
            <div class="carousel-item"><img src="{{ asset('img/p_libreta.jpg') }}" class="w-full object-cover h-72"></div>
        </div>
    </div>
</div>

<!-- Buscador -->
<form class="d-flex" action="{{ route('buscar') }}" method="GET" role="search">
    <input class="form-control me-1" type="search" name="query" placeholder="Buscar" aria-label="Buscar">
    <button class="btn btn-outline-success" type="submit">Buscar productos</button>
</form>


<!-- Mensaje Bienvenida -->
<div class="text-center mt-10">
    <img src="{{ asset('img/LOGO_Empresa.png') }}" class="mx-auto w-72 mb-4" alt="Logo Empresa">
    <h1 class="text-4xl font-bold text-blue-700">Bienvenido a Distribuidora ABC</h1>
    <p class="text-gray-700 mt-2">Líder en distribución de artículos escolares y de oficina.</p>
</div>

<!-- Recordatorio -->
<div class="mt-10 text-center">
    <div class="bg-white p-6 rounded shadow-md inline-block">
        <h3 class="text-xl font-semibold text-yellow-600 mb-2"><i class="fa-solid fa-bell"></i> Recordatorio</h3>
        <p class="text-gray-700">Descarga nuestra app desde:</p>
        <div class="flex justify-center gap-4 mt-4">
            <a href="#" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded"><i class="fa-brands fa-android"></i> Android</a>
            <a href="#" class="bg-black hover:bg-gray-800 text-white px-4 py-2 rounded"><i class="fa-brands fa-apple"></i> iOS</a>
        </div>
    </div>
</div>

<!-- Secciones: Productos y Afiliados -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12 container mx-auto px-4">
    <!-- Productos -->
    <div>
        <h3 class="text-2xl font-bold text-yellow-600 mb-4">Productos</h3>
        <div class="grid grid-cols-2 gap-4">
            @foreach ([
                ['img' => 'p_pluma.jpg', 'desc' => 'Plumas Bic Negro Azul Rojo y Verde'],
                ['img' => 'PapelMultiusos.jpg', 'desc' => 'Papel Multiusos'],
                ['img' => 'p_lapices.jpg', 'desc' => 'Lápices'],
                ['img' => 'p_libreta.jpg', 'desc' => 'Libretas pasta francesa'],
            ] as $producto)
                <div class="bg-white p-4 rounded shadow">
                    <img src="{{ asset('img/' . $producto['img']) }}" class="w-full h-40 object-contain mb-2" alt="">
                    <p class="text-center text-gray-700">{{ $producto['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Afiliados -->
    <div>
        <h3 class="text-2xl font-bold text-yellow-600 mb-4">Afiliados</h3>
        <div class="grid grid-cols-2 gap-4">
            @foreach (['LOGONORMA.png', 'MAPED.jpg', 'Logo-Bic.png', 'Crayola-Logo-1997.png'] as $logo)
                <div class="bg-white p-4 rounded shadow flex items-center justify-center">
                    <img src="{{ asset('img/' . $logo) }}" class="h-20 object-contain" alt="Afiliado">
                </div>
            @endforeach
        </div>
    </div>
</div>

</body>
@endsection