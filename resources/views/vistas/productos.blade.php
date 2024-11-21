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
                {{-- <img src="{{ $producto->imagen_url ?? 'https://proveedoradelasartesgraficas.com.mx/cdn/shop/files/LONABLANCA3.20MTSX50MTS_800x.jpg?v=1718740408' }}" alt="Producto {{ $producto->nombre }}" class="w-full h-48 object-cover rounded"> --}}
                
                <h3 class="text-lg mt-4">{{ $producto->nombre }}</h3>
                
                <p class="text-blue-400 text-xl font-bold mt-2">${{ number_format($producto->precio, 2) }}</p>
                
                <!-- Mostrar cantidad -->
                <p class="text-gray-300 text-md mt-2">Cantidad: <span class="font-semibold">{{ $producto->cantidad }}</span></p>
                
                <!-- Botón de editar producto -->
                <button class="bg-blue-600 text-white mt-4 px-4 py-2 rounded-lg">Editar Producto</button>
                
                <!-- Condicional para productos que contienen "lona" en el nombre -->
                @if (strpos(strtolower($producto->nombre), 'lona') !== false)
                    <button class="bg-green-600 text-white mt-2 px-4 py-2 rounded-lg">Botón Especial</button>
                @endif
            </div>
        @endforeach
    </div>
</div>

        
        {{-- <div class="flex-1 p-8">
            <div class="grid grid-cols-3 gap-6">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="bg-gray-700 rounded-lg p-4 text-center">
                        <img src="https://via.placeholder.com/150" alt="Producto {{ $i }}" class="w-full h-48 object-cover rounded">
                        <h3 class="text-lg mt-4">Producto {{ $i }}</h3>
                        <p class="text-blue-400 text-xl font-bold mt-2">${{ number_format(20 * $i, 2) }}</p>
                        <button class="bg-blue-600 text-white mt-4 px-4 py-2 rounded-lg">Editar Producto</button>
                    </div>
                @endfor
            </div>
        </div> --}}
    </div>
</x-app-layout>
