<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filament Practica</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Inter:400,600,700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

    <x-nav active="home" />

    <!-- Hero -->
    <div class="bg-gradient-to-br from-indigo-700 to-indigo-900 text-white">
        <div class="container mx-auto px-6 py-20 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Filament Practica</h1>
            <p class="text-indigo-200 text-lg max-w-2xl mx-auto">
                Un portal de noticias de ejemplo, construido con Laravel y FilamentPHP como proyecto de aprendizaje.
            </p>
        </div>
    </div>

    <!-- Aviso de proyecto de aprendizaje -->
    <div class="container mx-auto px-6 pt-8">
        <div class="bg-amber-50 border border-amber-100 rounded-xl shadow-md px-6 py-4 text-center text-sm text-amber-800 max-w-2xl mx-auto">
            Este es un proyecto de aprendizaje de Laravel + FilamentPHP. Todos los posts, usuarios y comentarios son <strong>datos ficticios</strong> generados automáticamente.
        </div>
    </div>

    <!-- Descripción + accesos -->
    <div class="container mx-auto px-6 py-16">
        <div class="max-w-3xl mx-auto text-center mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-3">¿Qué puedes ver aquí?</h2>
            <p class="text-gray-500 leading-relaxed">
                El panel de administración se ha construido con Filament (Resources, RelationManagers, plugins),
                y esta parte pública es una capa mínima en Blade para consumir esos mismos datos. Explora las
                noticias generadas o navega por categorías.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-3xl mx-auto">

            <a href="{{ route('posts.index') }}" class="bg-white rounded-xl shadow-md p-8 text-center hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-indigo-50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Noticias</h3>
                <p class="text-sm text-gray-500">Ver todos los posts publicados</p>
            </a>

            <a href="{{ route('categories.index') }}" class="bg-white rounded-xl shadow-md p-8 text-center hover:shadow-xl hover:-translate-y-1 transition duration-300">
                <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-indigo-50 flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Categorías</h3>
                <p class="text-sm text-gray-500">Explorar las noticias agrupadas por categoría</p>
            </a>

        </div>
    </div>

    <x-footer />

</body>
</html>
