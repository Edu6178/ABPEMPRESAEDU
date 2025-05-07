<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $user = auth()->user();

    if ($request->hasFile('foto')) {
        $ruta = $request->file('foto')->store('usuarios', 'public');
        $user->foto = $ruta;
    }

    $user->name = $request->name;
    $user->save();

    return back()->with('success', 'Perfil actualizado correctamente.');
}

}
