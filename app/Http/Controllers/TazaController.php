<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TazaController extends Controller
{
    //
    public function store(Request $request)
    {
        $producto = $this->crearProducto($request);
        // Lógica específica para playeras
        $producto = Taza::create($request->only('color'));

        // Por ejemplo, crear especificaciones de playera
        return response()->json($producto, 201);
    }
}
