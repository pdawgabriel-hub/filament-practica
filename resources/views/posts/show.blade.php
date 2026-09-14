<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Filament Practica</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Inter:400,600,700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

    <x-nav active="posts" />

    <!-- Hero con imagen del post -->
    <div class="bg-gradient-to-br from-indigo-700 to-indigo-900 text-white">
        <div class="container mx-auto px-6 py-16">
            <a href="{{ route('posts.index') }}" class="text-indigo-200 text-sm hover:text-white transition inline-flex items-center gap-1 mb-6">
                &larr; Volver a noticias
            </a>

            <span class="inline-block self-start text-xs font-semibold text-white bg-white/10 rounded-full px-3 py-1 mb-4">
                {{ $post->category->name ?? 'Sin categoría' }}
            </span>

            <h1 class="text-3xl md:text-4xl font-bold mb-4 max-w-3xl">{{ $post->title }}</h1>

            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-white text-xs font-bold">
                    {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                </div>
                <span class="text-sm text-indigo-200">
                    {{ $post->user->name ?? 'Anónimo' }} · Publicado el {{ $post->created_at->format('d/m/Y') }}
                </span>
            </div>
        </div>
    </div>

    <!-- Contenido -->
    <div class="container mx-auto px-6 pt-12 pb-12">
        <div class="max-w-3xl mx-auto">

            @if ($post->imagen_url)
                <div class="rounded-xl overflow-hidden shadow-lg mb-10">
                    <img
                        src="{{ str_starts_with($post->imagen_url, 'http') ? $post->imagen_url : asset('storage/' . $post->imagen_url) }}"
                        alt="{{ $post->title }}"
                        class="w-full h-80 object-cover"
                    >
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-md p-8 prose max-w-none">
                {!! $post->body !!}
            </div>

            <!-- Comentarios -->
            <div class="mt-12">
                <h2 class="text-xl font-bold text-gray-900 mb-6">
                    Comentarios ({{ $post->comments->count() }})
                </h2>

                <div class="space-y-4">
                    @forelse ($post->comments as $comment)
                        <div class="bg-white rounded-lg shadow-sm p-5 flex gap-4">
                            <div class="w-9 h-9 shrink-0 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 text-xs font-bold">
                                {{ strtoupper(substr($comment->user->name ?? 'A', 0, 1)) }}
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="text-sm font-semibold text-gray-800">
                                        {{ $comment->user->name ?? 'Anónimo' }}
                                    </span>
                                    <span class="text-xs text-gray-400">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600">{{ $comment->body }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-400 text-sm">Todavía no hay comentarios en este post.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    <x-footer />

</body>
</html>
