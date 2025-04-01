@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold mb-4">Crear Ciudad</h1>

        <form action="{{ route('ciudades.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre_ciudad" class="block">Nombre Ciudad</label>
                <input type="text" id="nombre_ciudad" name="nombre_ciudad" class="border p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label for="estado" class="block">Estado</label>
                <input type="text" id="estado" name="estado" class="border p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label for="codigo_postal" class="block">Código Postal</label>
                <input type="text" id="codigo_postal" name="codigo_postal" class="border p-2 w-full" required>
            </div>

            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Guardar Ciudad</button>
        </form>
    </div>
@endsection
