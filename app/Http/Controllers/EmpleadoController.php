<?php

// app/Http/Controllers/EmpleadoController.php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Mostrar lista de empleados
    public function index()
    {
        $empleados = Empleado::all(); // Obtener todos los empleados
        return view('empleados.index', compact('empleados'));
    }

    // Mostrar el formulario para crear un nuevo empleado
    public function create()
    {
        return view('empleados.create');
    }

    // Guardar un nuevo empleado
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_empleado' => 'required|string|max:255',
            'puesto' => 'required|string|max:100',
            'salario' => 'required|numeric',
            'fecha_contratacion' => 'required|date',
        ]);

        // Crear un nuevo empleado
        $empleado = new Empleado();
        $empleado->nombre_empleado = $request->input('nombre_empleado');
        $empleado->puesto = $request->input('puesto');
        $empleado->salario = $request->input('salario');
        $empleado->fecha_contratacion = $request->input('fecha_contratacion');
        $empleado->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
    }

    // Mostrar formulario para editar un empleado
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id); // Usar 'findOrFail' para buscar el registro por id
        return view('empleados.edit', compact('empleado'));
    }

    // Actualizar un empleado
    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id); // Usar 'findOrFail' para buscar el registro por id

        // Validar los datos del formulario
        $request->validate([
            'nombre_empleado' => 'required|string|max:255',
            'puesto' => 'required|string|max:100',
            'salario' => 'required|numeric',
            'fecha_contratacion' => 'required|date',
        ]);

        // Actualizar el empleado
        $empleado->nombre_empleado = $request->input('nombre_empleado');
        $empleado->puesto = $request->input('puesto');
        $empleado->salario = $request->input('salario');
        $empleado->fecha_contratacion = $request->input('fecha_contratacion');
        $empleado->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    // Eliminar un empleado
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
    
        // Reiniciar el contador de autoincremento
        \DB::statement('ALTER TABLE empleados AUTO_INCREMENT = 1');
    
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
