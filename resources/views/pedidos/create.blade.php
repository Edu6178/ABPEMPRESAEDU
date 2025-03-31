<!-- resources/views/pedidos/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-3xl font-bold mb-4">Crear Pedido</h1>

    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf
        <div class="mb-4">
        <label for="nombre_cliente" class="block">Nombre del Cliente</label>
        <input type="text" id="nombre_cliente" name="nombre_cliente" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="estado" class="block">Estado</label>
            <select id="estado" name="estado" class="border p-2 w-full" required>
                <option value="En proceso">En proceso</option>
                <option value="Entregado">Entregado</option>
                <option value="Cancelado">Cancelado</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="total" class="block">Total</label>
            <input type="number" id="total" name="total" class="border p-2 w-full" required>
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="bg-blue-500 text-black py-2 px-4 rounded">Guardar Pedido</button>
    </form>
</div>
@endsection
