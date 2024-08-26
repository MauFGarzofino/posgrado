<nav class="bg-gray-800 p-4">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <a href="/" class="text-white font-bold text-xl">Home</a>
                </div>
                <div class="sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{ route('modulos.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Módulos</a>
                        <a href="{{ route('menus-principales.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Menús Principales</a>
                        <a href="{{ route('menus.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Menús</a>
                        <a href="{{ route('roles.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Roles</a>
                        <a href="{{ route('roles-menus-principales.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Roles Menús Principales</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
