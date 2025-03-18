<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('bienvenido');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/dashboard', function () {
    return view('home');
})->name('dashboard');

Route::get('productos', function () {
    return view('productos');
})->name('productos');

Route::get('pedidos', function () {
    return view('pedidos');
})->name('pedidos');

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

Route::get('productos', function () {
    if (!Auth::check()) {
        return redirect()->route('bienvenido'); // Redirige si no está autenticado
    }
    return view('productos');
})->name('productos');
