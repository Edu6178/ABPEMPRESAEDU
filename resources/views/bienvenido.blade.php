
@extends('layouts.app')

@section('content')
<body class="bg-gray-200 tailwind-bg">

<link href="{{ mix('css/app.css') }}" rel="stylesheet">

<div class="text-bg-warning p-3 pt-4 w-100 position-absolute top-0 start-0"></div>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <ul class="nav nav-pills nav-fill align-items-center">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
            </li>
            <li class="nav-item dropdown ms-3">
                <a class="nav-link dropdown-toggle custom-yellow" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    Categorías
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Plumas</a></li>
                    <li><a class="dropdown-item" href="#">Libretas</a></li>
                    <li><a class="dropdown-item" href="#">Lápices</a></li>
                    <li><a class="dropdown-item" href="#">Mochilas</a></li>
                    <li><a class="dropdown-item" href="#">Pegamentos</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">No hay más opciones</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- SLIDER DE IMÁGENES -->
<div id="carouselExample" class="carousel slide mt-4 container" data-bs-ride="carousel">
    <div class="carousel-inner text-center" style="max-width: 900px; max-height: 450px; margin: auto;">
        <div class="carousel-item active">
            <img src="{{ asset('img/p_pluma.jpg') }}" class="d-block w-100" style="max-height: 450px; object-fit: contain;" alt="Plumas">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/PapelMultiusos.jpg') }}" class="d-block w-100" style="max-height: 450px; object-fit: contain;" alt="Papel Multiusos">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/p_lapices.jpg') }}" class="d-block w-100" style="max-height: 450px; object-fit: contain;" alt="Lápices">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/p_libreta.jpg') }}" class="d-block w-100" style="max-height: 450px; object-fit: contain;" alt="Libreta">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>



    <form class="d-flex" role="search">
    <input class="form-control me-1" type="Buscar" placeholder="Buscar" aria-label="Buscar">
    <button class="btn btn-outline-success" type="submit">Buscar productos</button>
    </form>
</div>
</nav>

<div class="text-bg-warning p-3"></div>




<div class="card custom-card">
<div class="card-header custom-header">
</div>
<div class="card-body">
    <h5 class="card-title custom-title"><i class="fa-solid fa-bell"></i> Recordatorio</h5>
    <p class="card-text">Puedes conseguir nuestra aplicación en la Play Store en el siguiente enlace</p>
    
    <a href="#" class="btn custom-btn"><i class="fa-brands fa-android"></i></a>
    <a href="#" class="btn custom-btn"><i class="fa-brands fa-apple"></i></a>
</div>
</div>



<div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
    <div class="text-center">
    <img src="{{ asset('img/LOGO_Empresa.png') }}" class=" mx-auto d-block w-10 " style="width: 30rem; min-height: 30rem;" alt="..." >
        <h1 class="text-5xl font-bold text-blue-600">Bienvenido a Distribuidora ABC</h1>
        <p class="text-lg text-gray-700 mt-4">Líder en distribución y abastecimiento de productos de calidad.</p>
        <p class="text-md text-gray-600 mt-2">Optimiza tu gestión con nuestra plataforma digital.</p>
        
    </div>
</div>

<div class="text-bg-warning p-3"></div>

<!----- inicio --->


<!---- seperador --->

<div class="row">
    <div class="col col-6 border-end border-4 border-warning p-4">

    

    <div class="row">
    <h3> Productos </h3>

    <div class="col-6 pt-3">
    <p> Plumas Bic Negro Azul Rojo y Verde <p>
    <img src="{{ asset('img/p_pluma.jpg') }}" class=" mx-auto d-block w-5 " style="width: 20rem; min-height: 20rem;" alt="..." >
    </div>
    <div class="col-6 pt-3">
    <p> PapelMultiusos<p>
    <img src="{{ asset('img/PapelMultiusos.jpg') }}" class=" mx-auto d-block w-5 " style="width: 20rem; min-height: 20rem;" alt="..." >

</div>
    <div class="col-6 pt-3">
    <p> Lapices<p>
    <img src="{{ asset('img/p_lapices.jpg') }}" class=" mx-auto d-block w-5 " style="width: 20rem; min-height: 20rem;" alt="..." >

</div>
    <div class="col-6 pt-3"><p>Libretas pasta francesa</p>
    <img src="{{ asset('img/p_libreta.jpg') }}" class=" mx-auto d-block w-5 " style="width: 20rem; min-height: 20rem;" alt="..." >
</div>

</div>



</div>
<div class="col col-6 border-end border-4 border-warning p-4">

<div class="row">
    <h3> Afiliados </h3>

    <div class="col-6 pt-3">
    <img src="{{ asset('img/LOGONORMA.png') }}" class=" mx-auto d-block w-5 " style="width: 20rem; min-height: 20rem;" alt="..." >
    </div>

    <div class="col-6 pt-3">
    <img src="{{ asset('img/MAPED.jpg') }}" class=" mx-auto d-block w-5 " style="width: 20rem; min-height: 20rem;" alt="..." >
</div>
    <div class="col-6 pt-3">
    <img src="{{ asset('img/Logo-Bic.png') }}" class=" mx-auto d-block w-5 " style="width: 20rem; min-height: 20rem;" alt="..." >
</div>
    <div class="col-6 pt-3">
    <img src="{{ asset('img/Crayola-Logo-1997.png') }}" class=" mx-auto d-block w-5 " style="width: 20rem; min-height: 20rem;" alt="..." >
</div>

</div>

<div class="row">

</div>








@endsection
