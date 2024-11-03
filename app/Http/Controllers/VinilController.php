<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VinilController extends Controller
{
    //
    public function store(Request $request)
    {
        $producto = $this->crearProducto($request);
        // Lógica específica para playeras
        $producto = Vinil::create($request->only('tamañoMedida', 'material' , 'largo', 'largoRestante'));

        // Por ejemplo, crear especificaciones de playera
        return response()->json($producto, 201);
    }

}
