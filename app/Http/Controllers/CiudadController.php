<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    // Mostrar la lista de ciudades
    public function index()
    {
        $ciudades = Ciudad::all(); // Obtener todas las ciudades
        return view('ciudades.index', compact('ciudades'));
    }

    // Mostrar el formulario de creación de ciudad
    public function create()
    {
        return view('ciudades.create');
    }

    // Guardar una nueva ciudad
    public function store(Request $request)
    {
        $request->validate([
            'nombre_ciudad' => 'required|string|max:100',
            'estado' => 'required|string|max:100',
            'codigo_postal' => 'required|string|max:10',
        ]);

        Ciudad::create([
            'nombre_ciudad' => $request->nombre_ciudad,
            'estado' => $request->estado,
            'codigo_postal' => $request->codigo_postal,
        ]);

        return redirect()->route('ciudades.index')->with('success', 'Ciudad creada correctamente');
    }

    // Mostrar el formulario para editar una ciudad
    public function edit($id)
    {
        $ciudad = Ciudad::findOrFail($id);
        return view('ciudades.edit', compact('ciudad'));
    }

    // Actualizar una ciudad
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_ciudad' => 'required|string|max:100',
            'estado' => 'required|string|max:100',
            'codigo_postal' => 'required|string|max:10',
        ]);

        $ciudad = Ciudad::findOrFail($id);
        $ciudad->update([
            'nombre_ciudad' => $request->nombre_ciudad,
            'estado' => $request->estado,
            'codigo_postal' => $request->codigo_postal,
        ]);

        return redirect()->route('ciudades.index')->with('success', 'Ciudad actualizada correctamente');
    }

    // Eliminar una ciudad
    public function destroy($id)
    {
        $ciudad = Ciudad::findOrFail($id);
    $ciudad->delete();

    // Reiniciar AUTO_INCREMENT después de la eliminación
    \DB::statement("ALTER TABLE ciudades AUTO_INCREMENT = 1");

    return redirect()->route('ciudades.index')->with('success', 'Ciudad eliminada correctamente');
    }
}
