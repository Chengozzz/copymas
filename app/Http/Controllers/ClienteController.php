<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    //
    public function index() //index de pedidos
    {
        $clientes = Cliente::all();

      

        // Pasar los pedidos a la vista
        //return view('dashboard', compact('pedidos'));
        return view('vistas.clientes', compact('clientes'));

    }
    public function crearCliente()
    {
        return view('forms.clientes');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'maquilador' => 'required|boolean',
        ]);

        // Crear un nuevo pedido
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->maquilador = $request->maquilador;
        $cliente->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('clientes')->with('success', 'Cliente agregado con éxito.');
    }
}
