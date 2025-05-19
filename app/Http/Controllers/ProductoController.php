<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Muestra una lista de los productos.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('productos.create');
    }

    /**
     * Almacena un producto recién creado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        // Validación para todos los campos, incluyendo los nuevos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string', // El tipo TEXT en la BD maneja la longitud
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'marca' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'material' => 'nullable|string|max:255',
            'caracteristicas_adicionales' => 'nullable|string', // El tipo TEXT en la BD maneja la longitud
        ]);

        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('productos', 'public');
        }

        // Creación del producto con todos los campos
        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $rutaImagen,
            'marca' => $request->marca, // Guardando el nuevo campo
            'color' => $request->color, // Guardando el nuevo campo
            'material' => $request->material, // Guardando el nuevo campo
            'caracteristicas_adicionales' => $request->caracteristicas_adicionales, // Guardando el nuevo campo
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente con todos sus detalles.');
    }

    /**
     * Muestra el producto especificado.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\View\View
     */
    public function show(Producto $producto) {
        $otrosProductos = Producto::where('id', '!=', $producto->id)
            ->inRandomOrder()
            ->take(4) // O el número que desees para el carrusel
            ->get();
        return view('productos.show', compact('producto', 'otrosProductos'));
    }

    /**
     * Muestra el formulario para editar el producto especificado.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\View\View
     */
    public function edit(Producto $producto) {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Actualiza el producto especificado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Producto $producto) {
        // Validación para todos los campos, incluyendo los nuevos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'marca' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'material' => 'nullable|string|max:255',
            'caracteristicas_adicionales' => 'nullable|string',
        ]);

        // Actualizar imagen si se proporciona una nueva
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $rutaImagen = $request->file('imagen')->store('productos', 'public');
            $producto->imagen = $rutaImagen;
        }

        // Actualizar los campos del producto
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->marca = $request->marca; // Actualizando el nuevo campo
        $producto->color = $request->color; // Actualizando el nuevo campo
        $producto->material = $request->material; // Actualizando el nuevo campo
        $producto->caracteristicas_adicionales = $request->caracteristicas_adicionales; // Actualizando el nuevo campo

        $producto->save(); // Guardar todos los cambios

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente con todos sus detalles.');
    }

    /**
     * Elimina el producto especificado de la base de datos.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Producto $producto) {
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado');
    }
}
