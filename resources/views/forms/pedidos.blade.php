<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
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
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Stock productos</a>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Agenda</a>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Configuración</a>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Cerrar sesión</a>
            </nav>
        </aside>

        <!-- Formulario centrado -->
        <div class="flex-1 flex items-center justify-center">
            
            <form action="{{ route('pedidosStore') }}" method="POST" class="w-full max-w-lg bg-gray-800 p-8 rounded-lg shadow-xl">
                @csrf <!-- Este es el token CSRF -->
                <div class="grid gap-6">
                    <!-- Seleccionar Cliente -->
                    <div>
                        <label for="cliente" class="block text-sm text-gray-400">Seleccionar Cliente</label>
                        <select id="cliente" name="cliente" class="p-3 w-full shadow-lg outline-none border-b-2 border-transparent focus:border-blue-500 bg-gray-700 text-white placeholder-gray-500 rounded">
                            <option value="" disabled selected>Seleccione un cliente</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <!-- Seleccionar Producto -->
                    <div>
                        <label for="producto" class="block text-sm text-gray-400">Seleccionar Producto</label>
                        <select id="producto" name="producto" class="p-3 w-full shadow-lg outline-none border-b-2 border-transparent focus:border-blue-500 bg-gray-700 text-white placeholder-gray-500 rounded">
                            <option value="" disabled selected>Seleccione un producto</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <!-- Cantidad de Productos -->
                    <div>
                        <label for="cantidad" class="block text-sm text-gray-400">Cantidad de Productos</label>
                        <input type="number" id="cantidad" name="cantidad" placeholder="Cantidad" class="p-3 w-full shadow-lg outline-none border-b-2 border-transparent focus:border-blue-500 bg-gray-700 text-white placeholder-gray-500 rounded" min="1">
                    </div>
        
                    <!-- Total -->
                    <div>
                        <label for="total" class="block text-sm text-gray-400">Total</label>
                        <input type="number" id="total" name="total" placeholder="Total" class="p-3 w-full shadow-lg outline-none border-b-2 border-transparent focus:border-blue-500 bg-gray-700 text-white placeholder-gray-500 rounded" min="0" step="0.01">
                    </div>
        
                    <!-- Medio de Recepción -->
                    <div>
                        <label for="medio" class="block text-sm text-gray-400">Medio de Recepción</label>
                        <select id="medio" name="medio" class="p-3 w-full shadow-lg outline-none border-b-2 border-transparent focus:border-blue-500 bg-gray-700 text-white placeholder-gray-500 rounded">
                            <option value="" disabled selected>Seleccione un medio</option>
                            <option value="efectivo">Mensaje</option>
                            <option value="tarjeta">En persona</option>
                        </select>
                    </div>
        
                    <!-- Anticipo -->
                    <div>
                        <label for="anticipo" class="block text-sm text-gray-400">Anticipo</label>
                        <input type="number" id="anticipo" name="anticipo" placeholder="Anticipo" class="p-3 w-full shadow-lg outline-none border-b-2 border-transparent focus:border-blue-500 bg-gray-700 text-white placeholder-gray-500 rounded" min="0" step="0.01">
                    </div>
        
                    <!-- Botón de Enviar -->
                    <button class="outline-none shadow-lg w-full p-3 bg-blue-600 text-white rounded-lg hover:bg-blue-500 font-bold" type="submit">Enviar</button>
                </div>
            </form>
        </div>
        
        
    </div>
</x-app-layout>
