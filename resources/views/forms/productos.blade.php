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
            <form class="w-full max-w-lg bg-gray-800 p-8 rounded-lg shadow-xl">
                <div class="grid gap-6">
                    <div class="flex gap-3">
                        <input class="capitalize shadow-lg p-3 w-full outline-none border-b-2 border-transparent focus:border-blue-500 placeholder-gray-500" type="text" placeholder="First Name" id="First-Name" name="First-Name" required="">
                        <input class="p-3 capitalize shadow-lg w-full placeholder-gray-500 outline-none border-b-2 border-transparent focus:border-blue-500" type="text" placeholder="Last Name" id="Last-Name" name="Last-Name">
                    </div>
                    <div class="grid gap-6">
                        <input class="p-3 shadow-lg w-full placeholder-gray-500 outline-none border-b-2 border-transparent focus:border-blue-500" type="email" placeholder="Email" id="Email" name="email">
                        <input class="p-3 shadow-lg w-full placeholder-gray-500 outline-none border-b-2 border-transparent focus:border-blue-500" type="date" required="">
                    </div>
                    <div class="flex gap-3">
                        <input class="p-3 shadow-lg w-full placeholder-gray-500 outline-none border-b-2 border-transparent focus:border-blue-500" type="password" placeholder="Password" id="password" name="password" required="">
                        <input class="p-3 shadow-lg w-full placeholder-gray-500 outline-none border-b-2 border-transparent focus:border-blue-500" type="password" placeholder="Confirm password" required="">
                    </div>
                    <button class="outline-none shadow-lg w-full p-3 bg-blue-600 text-white rounded-lg hover:bg-blue-500 font-bold" type="submit">Submit</button>
                </div>
            </form>
        </div>
        
    </div>
</x-app-layout>
