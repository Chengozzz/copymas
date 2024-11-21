<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Clientes') }}
            </h2>
            <!-- Botón de agregar cliente -->
            <a href="{{ route('crearCliente') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg">
                Agregar Cliente
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
                <a href="{{ route('clientes') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Clientes</a>
            </nav>
        </aside>

        <!-- Contenido principal -->
<div class="flex-1 p-8">
    <h3 class="text-xl font-bold mb-6">Lista de Clientes</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 text-gray-100 rounded-lg shadow-lg">
            <thead class="bg-gray-700 text-left">
                <tr>
                    <th class="px-6 py-3 text-sm font-medium uppercase">Nombre</th>
                    <th class="px-6 py-3 text-sm font-medium uppercase">¿Es maquilador?</th>
                    <th class="px-6 py-3 text-sm font-medium uppercase">Descuento</th>
                    <th class="px-6 py-3 text-sm font-medium uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach ($clientes as $cliente)
                <tr>
                    <!-- Columna Nombre -->
                    <td class="px-6 py-4 text-sm">{{ $cliente->nombre }}</td>

                    <!-- Columna Maquilador -->
                    <td class="px-6 py-4 text-sm">
                        <select class="bg-gray-700 text-gray-100 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-500">
                            <option value="no" @if (!$cliente->es_maquilador) selected @endif>No</option>
                            <option value="si" @if ($cliente->es_maquilador) selected @endif>Sí</option>
                        </select>
                    </td>

                    <!-- Columna Descuento -->
                    <td class="px-6 py-4 text-sm">
                        <input 
                            type="text" 
                            class="bg-gray-700 text-gray-100 p-2 rounded-lg w-full focus:outline-none focus:ring focus:ring-blue-500" 
                            placeholder="Descuento %" 
                            min="0" max="100" 
                            value="" 
                        />
                    </td>

                    <!-- Columna Acciones -->
                    <td class="px-6 py-4 text-sm flex flex-col gap-2">
                        <button class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg w-full">Editar</button>
                        <button class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-lg w-full">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    </div>
</x-app-layout>
