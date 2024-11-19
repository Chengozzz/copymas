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

    }}
