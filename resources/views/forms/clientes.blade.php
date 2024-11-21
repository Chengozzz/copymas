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
        <div class="flex-1 flex items-center justify-center">
            
            <form action="{{ route('clienteStore') }}" method="POST" class="w-full max-w-lg bg-gray-800 p-8 rounded-lg shadow-xl">
                @csrf <!-- Este es el token CSRF -->
                <div class="grid gap-6">
                
        
                <!-- Campo Nombre -->
        <div>
            <label for="nombre" class="block text-sm text-gray-400">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" 
                class="p-3 w-full shadow-lg outline-none border-b-2 border-transparent focus:border-blue-500 bg-gray-700 text-white placeholder-gray-500 rounded" 
                required>
        </div>

        <!-- Campo Maquilador -->
        <div>
            <label class="block text-sm text-gray-400">¿Es Maquilador?</label>
            <div class="flex items-center gap-4">
                <!-- Opción Sí -->
                <label class="flex items-center gap-2">
                    <input type="radio" id="maquilador_si" name="maquilador" value="1" 
                        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" 
                        required>
                    <span class="text-gray-400">Sí</span>
                </label>
                <!-- Opción No -->
                <label class="flex items-center gap-2">
                    <input type="radio" id="maquilador_no" name="maquilador" value="0" 
                        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" 
                        required>
                    <span class="text-gray-400">No</span>
                </label>
            </div>
        </div>
            <!-- Botón de Enviar -->
            <button class="outline-none shadow-lg w-full p-3 bg-blue-600 text-white rounded-lg hover:bg-blue-500 font-bold" 
            type="submit">Enviar</button>
            </form>
        </div>
        
        
    </div>
</x-app-layout>
