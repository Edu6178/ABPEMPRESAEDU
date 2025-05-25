@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold text-yellow-600 mb-4">Resultados para: "{{ $termino }}"</h2>

    @if ($resultados->isEmpty())
        <p class="text-red-600">No se encontraron productos con ese nombre.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($resultados as $producto)
                <div class="bg-white p-4 rounded shadow text-center">
                    <img src="{{ asset('img/' . $producto->imagen) }}" class="w-full h-40 object-contain mb-2" alt="{{ $producto->nombre }}">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $producto->nombre }}</h3>
                    <p class="text-gray-600">{{ $producto->descripcion }}</p>
                    <p class="text-blue-500 font-bold">{{ $producto->precio }} MXN</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
