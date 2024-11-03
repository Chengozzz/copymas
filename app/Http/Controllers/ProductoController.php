<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    protected function crearProducto(Request $request)
    {
        // Lógica común para crear un producto
        $producto = Producto::create($request->only('nombre', 'tipo'));
        return $producto;
    }
    public function store(Request $request)
    {
        // el producto que fue creado en el middleware
        $producto = $request->attributes->get('producto');

        // Devuelve una respuesta JSON con el producto creado
        return response()->json($producto, 201);
    }
}

