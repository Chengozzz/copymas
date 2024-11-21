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
    public function edit(Request $request)
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
    public function productoStore(Request $request)
    {
         // Validación de los datos
        $request->validate([
            'nombre' => 'required|string',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'nullable|numeric|min:0',
        ]);

        // Crear un nuevo pedido
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('productos')->with('success', 'Producto creado con éxito.');
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

            //editar pedido
            public function editarPedido($id)
            {
                $pedido = Pedido::findOrFail($id);
                return view('forms.editarPedido', compact('pedido'));
            }

            public function actualizarPedido(Request $request, $id)
            {
                $request->validate([
                    'cantidadProductos' => 'required|integer|min:1',
                    'estadoActual' => 'required|string|in:recibido,pendiente,cancelado',
                    'total' => 'required|numeric|min:0',
                ]);
            
                $pedido = Pedido::findOrFail($id);
                
                // Actualizar los campos
                $pedido->cantidadProductos = $request->input('cantidadProductos');
                $pedido->estadoActual = $request->input('estadoActual');
                $pedido->total = $request->input('total');
                
                // Guardar los cambios
                $pedido->save();
            
                // Redireccionar o mostrar mensaje de éxito
                return redirect()->route('pedidos')->with('success', 'Pedido actualizado correctamente.');
            }
            public function borrarPedido($id)
        {
            try {
                // Buscar el pedido por ID
                $pedido = Pedido::findOrFail($id);

                // Eliminar el pedido
                $pedido->delete(); 

                // Redireccionar con mensaje de éxito
                return redirect()->route('pedidos')->with('success', 'Pedido eliminado correctamente.');
            } 
            catch (\Exception $e) {
                // Redireccionar con mensaje de error si ocurre un problema
                return redirect()->route('pedidos')->with('error', 'Ocurrió un error al eliminar el pedido.');
            }
        }

        public function aumentarCantidad($id)
        {
            try {
                // Buscar el producto por ID
                $producto = Producto::findOrFail($id);

                // Incrementar la cantidad
                $producto->cantidad += 1;
                $producto->save();

                // Redirigir con mensaje de éxito
                return redirect()->back()->with('success', 'Cantidad aumentada correctamente.');
            } catch (\Exception $e) {
                // Redirigir con mensaje de error
                return redirect()->back()->with('error', 'Ocurrió un error al actualizar la cantidad.');
            }
        }

        public function disminuirCantidad($id)
        {
            try {
                // Buscar el producto por ID
                $producto = Producto::findOrFail($id);

                // Disminuir la cantidad si es mayor a 0
                if ($producto->cantidad > 0) {
                    $producto->cantidad -= 1;
                    $producto->save();
                }

                // Redirigir con mensaje de éxito
                return redirect()->back()->with('success', 'Cantidad disminuida correctamente.');
            } catch (\Exception $e) {
                // Redirigir con mensaje de error
                return redirect()->back()->with('error', 'Ocurrió un error al actualizar la cantidad.');
            }
        }

}

