<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <!-- Botón de agregar producto -->
            <a href="{{ route('crearProductos') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg">
                Agregar Producto
            </a>
        </div>
    </x-slot>

    {{-- Contenedor principal con flex --}}
    <div class="min-h-screen flex bg-gray-900 text-gray-100">
        
      <!-- Sidebar -->
      <aside class="w-64 bg-gray-800 p-6 rounded-lg">
        <h1 class="text-2xl font-semibold mb-4">CopyMas</h1>
        <nav class="space-y-2">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded bg-gray-700 text-white">Dashboard</a>
            <a href="{{ route('productos') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Productos</a>
            <a href="{{ route('pedidos') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Pedidos</a>
            {{-- <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Stock productos</a> --}}
            <a href="{{ route('clientes') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Clientes</a>
            {{-- <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Configuración</a>
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Cerrar sesión</a> --}}
        </nav>
    </aside>
        
      <!-- Contenido principal con grilla de productos -->
      <div class="flex-1 p-8">
        <div class="grid grid-cols-3 gap-6">
            @foreach ($productos as $producto)
                <div class="bg-gray-700 rounded-lg p-4 text-center">
                    <h3 class="text-lg mt-4">{{ $producto->nombre }}</h3>
                    
                    <p class="text-blue-400 text-xl font-bold mt-2">${{ number_format($producto->precio, 2) }}</p>
                    
                    <!-- Mostrar cantidad -->
                    <p class="text-gray-300 text-md mt-2">Cantidad: <span class="font-semibold">{{ $producto->cantidad }}</span></p>
                    
                    <!-- Botones para modificar cantidad -->
                    <div class="flex justify-center items-center gap-4 mt-4">
                        <!-- Botón de disminuir cantidad -->
                        <form action="{{ route('disminuirCantidad', $producto->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button 
                                type="submit"
                                class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-lg">
                                -
                            </button>
                        </form>
    
                        <!-- Botón de aumentar cantidad -->
                        <form action="{{ route('aumentarCantidad', $producto->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button 
                                type="submit"
                                class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-lg">
                                +
                            </button>
                        </form>
                    </div>
                    
                    <!-- Botón de editar producto -->
                    <button class="bg-blue-600 text-white mt-4 px-4 py-2 rounded-lg">Editar Producto</button>
                </div>
            @endforeach
        </div>
    </div>
    

</x-app-layout>
