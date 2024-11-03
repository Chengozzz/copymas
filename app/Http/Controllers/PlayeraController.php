<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayeraController extends Controller
{
    //
    public function store(Request $request)
    {
        $producto = $this->crearProducto($request);
        // Lógica específica para playeras
        $producto = Playera::create($request->only('talla', 'color', 'material'));

        // Por ejemplo, crear especificaciones de playera
        return response()->json($producto, 201);
    }
}
