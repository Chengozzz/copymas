<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
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
            <!-- Dashboard Header -->
            <h2 class="text-3xl font-bold mb-6">Dashboard</h2>
    
            <!-- Dashboard Stats -->
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div class="bg-gray-800 p-4 rounded-lg">
                    <p class="text-lg">Órdenes Totales</p>
                    <p class="text-2xl font-semibold">{{ number_format($totalPedidos) }}</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-lg">
                    <p class="text-lg">Ventas Totales</p>
                    <p class="text-2xl font-semibold">${{ number_format($totalVentas, 2) }}</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-lg">
                    <p class="text-lg">Pendientes</p>
                    <p class="text-2xl font-semibold">{{ number_format($pendientes) }}</p>
                </div>
            </div>
            
            <!-- Sales Table -->
            <div class="bg-gray-800 p-4 rounded-lg">
                <h3 class="text-xl font-semibold mb-4">Ventas</h3>
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Producto</th>
                            <th class="px-4 py-2">Cliente</th>
                            <th class="px-4 py-2">Fecha</th>
                            <th class="px-4 py-2">Piezas</th>
                            <th class="px-4 py-2">Cantidad</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                        <tr class="border-t border-gray-700">
                            <td class="px-4 py-2">{{ $pedido->producto->nombre }}</td>
                            <td class="px-4 py-2">{{ $pedido->cliente->nombre }}</td>
                            <td class="px-4 py-2">{{ $pedido->fecha }}</td>
                            <td class="px-4 py-2">{{ $pedido->cantidadProductos }}</td>
                            <td class="px-4 py-2">{{ $pedido->total }}</td>
                            <td class="px-4 py-2">
                                @if ($pedido->estadoActual == 'recibido')
                                <span class="px-3 py-1 rounded-full text-sm bg-green-500 text-white">Recibido</span>
                                @elseif ($pedido->estadoActual == 'pendiente')
                                <span class="px-3 py-1 rounded-full text-sm bg-yellow-500 text-white">Pendiente</span>
                                @else
                                <span class="px-3 py-1 rounded-full text-sm bg-red-500 text-white">Cancelado</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
