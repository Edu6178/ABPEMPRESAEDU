<?php

namespace App\Http\Controllers;

use App\Models\Producto; // ¡Importante! Para usar tu modelo Producto.
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    /**
     * Muestra el catálogo de productos.
     * Este método será llamado por la ruta /catalogo.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtener los productos de la base de datos.
        $productos = Producto::all(); // Obtiene todos los productos.

        // Opcional: Si tienes muchos productos, podrías querer paginarlos:
        // $productos = Producto::paginate(12); // Muestra 12 productos por página.
        // Si usas paginate, necesitarás añadir {{ $productos->links() }} en tu vista catalogo.blade.php.

        // Pasar los productos a la vista.
        // Laravel buscará un archivo llamado 'catalogo.blade.php' en la carpeta 'resources/views/'.
        return view('catalogo', compact('productos'));
    }
}
