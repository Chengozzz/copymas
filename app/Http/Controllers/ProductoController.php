<?php
//aqui manejamos el controller del pedido xd

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido; // Modelo pedido
use App\Models\Producto; //Modelo producto
use App\Models\Cliente; //Modelo cliente
use Carbon\Carbon; //dependencia para el tiempo 
class ProductoController extends Controller
{
    protected function crearProducto(Request $request) // producto
    {
        // Lógica común para crear un producto
        $producto = Producto::create($request->only('nombre', 'tipo'));
        return $producto;
    }
    public function store(Request $request)
    {
         // Validación de los datos
        $request->validate([
            'cliente' => 'required|exists:clientes,id',
            'producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'medio' => 'required|string',
            'anticipo' => 'nullable|numeric|min:0',
        ]);

        // Crear un nuevo pedido
        $pedido = new Pedido();
        $pedido->cliente_id = $request->cliente;
        $pedido->fecha= today();
        $pedido->producto_id = $request->producto;
        $pedido->total = $request->total;
        $pedido->cantidadProductos = $request->cantidad;
        $pedido->estadoActual= 'recibido'; 
        $pedido->medio = $request->medio;
        //agregar metodo pago
        $pedido->metodoPago= 0; 
        $pedido->anticipo = $request->anticipo ?? 0; // Si no hay anticipo, se asume 0
        $pedido->entregado= 0;
        $pedido->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('pedidos')->with('success', 'Pedido creado con éxito.');
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
    //index productos
    public function indexProductos()
    {
        $productos = Producto::all();
        return view('vistas.productos',compact('productos'));
    }

    //form para crear productos (no creo se quede)
    public function crearProductos()
    {
        return view('forms.productos');
    }

    //form para crear pedidos
    public function crearPedidos()
    {
        $clientes = Cliente::all();   // Obtiene todos los clientes
        $productos = Producto::all(); // Obtiene todos los productos

        return view('forms.pedidos', compact('clientes', 'productos'));
    }


}

