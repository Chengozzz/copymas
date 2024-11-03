<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LonaController extends Controller
{
    //
    public function store(Request $request)
    {
        $producto = $this->crearProducto($request);
        // Lógica específica para playeras
        $producto = Lona::create($request->only('tamañoMedida', 'largo', 'largoRestante'));

        // Por ejemplo, crear especificaciones de playera
        return response()->json($producto, 201);
    }

}
