<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\Ciudad;  // Asegúrate de importar el modelo Ciudad

class PedidoController extends Controller
{
    // Mostrar la lista de pedidos
    public function index()
    {
        // Obtener todos los pedidos junto con el nombre de la ciudad
        $pedidos = Pedido::leftJoin('ciudades', 'pedidos.id_ciudad', '=', 'ciudades.id_ciudad')
                ->select('pedidos.*', 'ciudades.nombre_ciudad')
                ->get();


        // Pasamos los pedidos a la vista
        return view('pedidos.index', compact('pedidos'));
    }

    // Mostrar el formulario de creación de pedido
    public function create()
    {
        return view('pedidos.create');
    }

    // Guardar un nuevo pedido
    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:200',
            'estado' => 'required',
            'total' => 'required|numeric',
        ]);
    
        Pedido::create([
            'nombre_cliente' => $request->nombre_cliente,
            'estado' => $request->estado,
            'total' => $request->total,
            // Asegúrate de incluir 'id_ciudad' si lo necesitas en este formulario
            'id_ciudad' => $request->id_ciudad,
        ]);
    
        // Redireccionar a la lista de pedidos con un mensaje de éxito
        return redirect()->route('pedidos.index')->with('success', 'Pedido creado correctamente');
    }

    // Mostrar el formulario para editar un pedido
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.edit', compact('pedido'));
    }

    // Actualizar un pedido
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:200',
            'estado' => 'required',
            'total' => 'required|numeric',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update([
            'nombre_cliente' => $request->nombre_cliente,
            'estado' => $request->estado,
            'total' => $request->total,
            // Asegúrate de actualizar 'id_ciudad' si lo necesitas
            'id_ciudad' => $request->id_ciudad,
        ]);

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado correctamente');
    }

    // Eliminar un pedido
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        \DB::statement('ALTER TABLE pedidos AUTO_INCREMENT = 1');

        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado correctamente');
    }
}
