<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('bienvenido');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use App\Http\Controllers\PedidoController;

Route::resource('pedidos', PedidoController::class);


use App\Http\Controllers\CiudadController;

Route::resource('ciudades', CiudadController::class);

use App\Http\Controllers\EmpleadoController;

Route::resource('empleados', EmpleadoController::class);

Route::put('/perfil', [\App\Http\Controllers\PerfilController::class, 'update'])->name('perfil.update');





Route::get('/dashboard', function () {
    return view('home');
})->name('dashboard');

use App\Http\Controllers\ProductoController;

Route::resource('productos', ProductoController::class);  // Ruta de recurso para productos

Route::get('productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');


////Route::get('pedidos', function () {
    ///return view('pedidos');
////})->name('pedidos');

Route::get('catalogo', function () {
    return view('catalogo');
})->name('catalogo');

Route::get('perfil', function () {
    return view('perfil');
})->name('perfil');


//crear logins
use App\Http\Controllers\Auth\RegisterController;

// Mostrar el formulario de registro
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Procesar el formulario de registro
Route::post('register', [RegisterController::class, 'register']);




Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('bienvenido');
})->name('bienvenido');

