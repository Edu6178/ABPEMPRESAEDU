@extends('layouts.app')

@section('content')
<div class="flex-1 p-10">
    <h1 class="text-3xl font-bold mb-4">Editar Pedido</h1>
    <div class="bg-white rounded-lg p-6 shadow">
        <form action="{{ route('pedidos.update', $pedido->id_pedido) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block mb-2">Nombre del Cliente:</label>
            <input type="text" name="nombre_cliente" value="{{ $pedido->nombre_cliente }}" class="border p-2 w-full mb-4" required>

            <label class="block mb-2">Total:</label>
            <input type="text" name="total" value="{{ $pedido->total }}" class="border p-2 w-full mb-4" required>

            <label class="block mb-2">Estado:</label>
            <select name="estado" class="border p-2 w-full mb-4">
                <option value="Pendiente" {{ $pedido->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="En proceso" {{ $pedido->estado == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                <option value="Entregado" {{ $pedido->estado == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                <option value="Cancelado" {{ $pedido->estado == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>

            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Actualizar Pedido</button>
        </form>
    </div>
</div>
@endsection
