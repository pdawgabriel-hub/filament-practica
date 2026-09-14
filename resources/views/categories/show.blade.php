<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - Filament Practica</title>

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
            <p class="text-indigo-200 text-sm mb-2">
                <a href="{{ route('categories.index') }}" class="hover:text-white transition">&larr; Todas las categorías</a>
            </p>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $category->name }}</h1>
            <p class="text-indigo-200 text-lg max-w-xl mx-auto">
                Noticias de la categoría "{{ $category->name }}".
            </p>
        </div>
    </div>

    <!-- Posts -->
    <div class="container mx-auto px-6 pt-16 pb-16">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse ($posts as $post)
                <article class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col hover:shadow-2xl hover:-translate-y-1 transition duration-300">

                    @if ($post->imagen_url)
                        <div class="h-48 overflow-hidden">
                            <a href="{{ route('posts.show', $post->slug) }}">
                                <img
                                    src="{{ str_starts_with($post->imagen_url, 'http') ? $post->imagen_url : asset('storage/' . $post->imagen_url) }}"
                                    alt="{{ $post->title }}"
                                    class="w-full h-full object-cover hover:scale-105 transition duration-300"
                                >
                            </a>
                        </div>
                    @else
                        <div class="h-48 bg-gray-100 flex items-center justify-center text-gray-300 text-sm">
                            Sin imagen
                        </div>
                    @endif

                    <div class="p-6 flex flex-col flex-grow">
                        <h2 class="text-lg font-bold text-gray-900 mb-2 leading-snug">
                            <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-indigo-600 transition">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <p class="text-gray-500 text-sm flex-grow leading-relaxed">
                            {{ Str::limit(strip_tags($post->body), 50, '...') }}
                        </p>

                        <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center gap-1 text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition mt-4">
                            Seguir leyendo
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>

                        <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 text-xs font-bold">
                                    {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                                </div>
                                <span class="text-xs text-gray-500">{{ $post->user->name ?? 'Anónimo' }}</span>
                            </div>
                            <span class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                </article>
            @empty
                <div class="col-span-full text-center py-16">
                    <p class="text-gray-400 text-lg">No hay posts en esta categoría todavía.</p>
                </div>
            @endforelse

        </div>

    </div>

    <x-footer />

</body>
</html>
