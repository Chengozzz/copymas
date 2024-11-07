<?php
//aqui manejamos el controller del pedido xd

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido; // Asegúrate de que esta línea esté presente
use Carbon\Carbon;

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

    public function index() //index de pedidos
    {
        $totalPedidos = Pedido::count();

        // Obtener la suma del total de los pedidos del mes actual
        $mesActual = Carbon::now()->format('m');
        $totalVentas = Pedido::whereMonth('fecha', $mesActual)->sum('total');

        // Contar los pedidos con estado 'pendiente'
        $pendientes = Pedido::where('estadoActual', 'pendiente')->count();

        // Obtén todos los pedidos
        $pedidos = Pedido::all();

        // Pasar los pedidos a la vista
        //return view('dashboard', compact('pedidos'));
        return view('dashboard', compact('totalPedidos','pedidos', 'totalVentas', 'pendientes'));

    }
    public function index2() //index de pedidos
    {
        //$totalPedidos = Pedido::count();

        // Obtener la suma del total de los pedidos del mes actual
       // $mesActual = Carbon::now()->format('m');
       // $totalVentas = Pedido::whereMonth('fecha', $mesActual)->sum('total');

        // Contar los pedidos con estado 'pendiente'
        //$pendientes = Pedido::where('estadoActual', 'pendiente')->count();

        // Obtén todos los pedidos
        $pedidos = Pedido::all();

        // Pasar los pedidos a la vista
        //return view('dashboard', compact('pedidos'));
        return view('vistas.pedidos', compact('pedidos'));

    }
}

