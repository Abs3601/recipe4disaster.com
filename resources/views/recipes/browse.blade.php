<x-app-layout>

<div class="max-w-6xl mx-auto px-6 py-12">

    <!-- Page Title -->
    <h1 class="h1 mb-6 text-center">Browse Recipes</h1>

    <p class="p text-center mb-10 text-ui-muted">
        Explore disastrous creations submitted by users around the world.
    </p>

    <!-- Recipes Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse ($recipes as $recipe)
            <div class="recipe-card">

                <img src="{{ asset('storage/' . $recipe->image_path) }}"
                     class="w-full h-48 object-cover rounded-brand mb-4 shadow-soft"
                >

                <h2 class="h2 mb-2">{{ $recipe->title }}</h2>

                <p class="p mb-3">
                    {{ Str::limit($recipe->description, 100) }}
                </p>

                <a href="{{ route('recipes.show', $recipe) }}" class="link">
                    View Recipe →
                </a>
            </div>
        @empty
            <p class="p col-span-full text-center mt-10">
                No recipes found. Check back later!
            </p>
        @endforelse

    </div>

    <!-- Pagination -->
    <div class="mt-10">
        {{ $recipes->links() }}
    </div>

</div>

</x-app-layout>
