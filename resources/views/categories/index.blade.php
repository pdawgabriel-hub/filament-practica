<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías - Filament Practica</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Inter:400,600,700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

    <x-nav active="categories" />

    <!-- Hero -->
    <div class="bg-gradient-to-br from-indigo-700 to-indigo-900 text-white">
        <div class="container mx-auto px-6 py-16 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Categorías</h1>
            <p class="text-indigo-200 text-lg max-w-xl mx-auto">
                Explora las noticias agrupadas por categoría.
            </p>
        </div>
    </div>

    <!-- Categorías -->
    <div class="container mx-auto px-6 pt-16 pb-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse ($categories as $category)
                <a
                    href="{{ route('categories.show', $category) }}"
                    class="bg-white rounded-xl shadow-md p-6 flex items-center justify-between hover:shadow-xl hover:-translate-y-1 transition duration-300"
                >
                    <span class="text-lg font-bold text-gray-900">{{ $category->name }}</span>
                    <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 rounded-full px-3 py-1">
                        {{ $category->posts_count }} {{ $category->posts_count === 1 ? 'post' : 'posts' }}
                    </span>
                </a>
            @empty
                <div class="col-span-full text-center py-16">
                    <p class="text-gray-400 text-lg">Todavía no hay categorías creadas.</p>
                </div>
            @endforelse

        </div>
    </div>

    <x-footer />

</body>
</html>
