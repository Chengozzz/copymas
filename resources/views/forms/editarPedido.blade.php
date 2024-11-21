<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('crearPedidos') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg">
                Agregar Pedido
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
        

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold mb-6">Editar Pedido</h3>
                <form action="{{ route('actualizarPedido', $pedido->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    
                    <!-- Campo para Piezas -->
                    <div>
                        <label for="cantidadProductos" class="block text-sm text-gray-400">Piezas</label>
                        <input type="number" id="cantidadProductos" name="cantidadProductos" 
                            value="{{ old('cantidadProductos', $pedido->cantidadProductos) }}" 
                            class="p-3 w-full shadow-lg outline-none border-b-2 border-transparent focus:border-blue-500 bg-gray-700 text-white rounded" 
                            required min="1">
                    </div>
        
                    <!-- Campo para Status -->
                    <div>
                        <label for="estadoActual" class="block text-sm text-gray-400">Estado</label>
                        <select id="estadoActual" name="estadoActual" 
                                class="p-3 w-full shadow-lg outline-none border-b-2 border-transparent focus:border-blue-500 bg-gray-700 text-white rounded" 
                                required>
                            <option value="recibido" {{ $pedido->estadoActual === 'recibido' ? 'selected' : '' }}>Recibido</option>
                            <option value="pendiente" {{ $pedido->estadoActual === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="cancelado" {{ $pedido->estadoActual === 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                    </div>
        
                    <!-- Campo para Cantidad (Total) -->
                    <div>
                        <label for="total" class="block text-sm text-gray-400">Total</label>
                        <input type="number" id="total" name="total" 
                            value="{{ old('total', $pedido->total) }}" 
                            class="p-3 w-full shadow-lg outline-none border-b-2 border-transparent focus:border-blue-500 bg-gray-700 text-white rounded" 
                            required min="0" step="0.01">
                    </div>
        
                    <!-- Botón de Guardar -->
                    <button type="submit" 
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-500">
                        Guardar Cambios
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
