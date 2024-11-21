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
            {{-- <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Stock productos</a> --}}
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Clientes</a>
            {{-- <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Configuración</a>
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Cerrar sesión</a> --}}
        </nav>
    </aside>

    <!-- Formulario centrado -->
<!-- Formulario centrado -->
<div class="flex-1 flex items-center justify-center">
    <form action="{{ route('productoStore') }}" method="POST" class="w-full max-w-lg bg-gray-800 p-8 rounded-lg shadow-xl">
        @csrf
        <div class="grid gap-6">
            <div class="flex gap-3">
                <input class="capitalize shadow-lg p-3 w-full outline-none border-b-2 border-transparent focus:border-blue-500 placeholder-gray-500" type="text" placeholder="Nombre" id="nombre" name="nombre" required="">
            </div>
            <div class="grid gap-6">
                <input class="p-3 shadow-lg w-full placeholder-gray-500 outline-none border-b-2 border-transparent focus:border-blue-500" type="number" placeholder="Cantidad" id="cantidad" name="cantidad" required="">
                <input class="p-3 shadow-lg w-full placeholder-gray-500 outline-none border-b-2 border-transparent focus:border-blue-500" type="text" placeholder="Precio" id="precio" name="precio" required="">
                {{-- <select class="p-3 shadow-lg w-full placeholder-gray-500 outline-none border-b-2 border-transparent focus:border-blue-500" id="tipo" name="tipo" required="">
                    <option value="">Seleccione un tipo</option>
                    <option value="lona">Lona</option>
                    <option value="vinil">Vinil</option>
                    <option value="taza">Taza</option>
                    <option value="playera">Playera</option>
                </select> --}}
            </div>
            <button class="outline-none shadow-lg w-full p-3 bg-blue-600 text-white rounded-lg hover:bg-blue-500 font-bold" type="submit">Enviar</button>
        </div>
    </form>
</div>


    </div>
</x-app-layout>
