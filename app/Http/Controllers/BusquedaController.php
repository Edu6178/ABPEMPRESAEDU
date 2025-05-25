<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class BusquedaController extends Controller
{
    public function buscar(Request $request)
    {
        $termino = $request->input('query');
        $resultados = Producto::where('nombre', 'LIKE', '%' . $termino . '%')->get();

        return view('resultados', compact('termino', 'resultados'));
    }
}
