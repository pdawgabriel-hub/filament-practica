@props(['active' => null])

<nav class="w-full bg-white border-b border-gray-100 sticky top-0 z-10">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <a href="{{ url('/') }}" class="text-xl font-bold text-gray-900 tracking-tight">
            Filament<span class="text-indigo-600">Practica</span>
        </a>
        <ul class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-600">
            <li>
                <a
                    href="{{ url('/') }}"
                    class="hover:text-indigo-600 transition {{ $active === 'home' ? 'text-indigo-600' : '' }}"
                >Inicio</a>
            </li>
            <li>
                <a
                    href="{{ route('posts.index') }}"
                    class="hover:text-indigo-600 transition {{ $active === 'posts' ? 'text-indigo-600' : '' }}"
                >Noticias</a>
            </li>
            <li>
                <a
                    href="{{ route('categories.index') }}"
                    class="hover:text-indigo-600 transition {{ $active === 'categories' ? 'text-indigo-600' : '' }}"
                >Categorías</a>
            </li>
        </ul>
    </div>
</nav>
