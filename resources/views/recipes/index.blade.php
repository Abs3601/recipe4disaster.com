<x-app-layout>

    <section class="relative hero-bg mb-14">
    <div class="hero-overlay"></div>

    <div class="relative z-10 max-w-3xl mx-auto text-center">

        <h1 class="h1 mb-4 text-white drop-shadow-lg">
            Recipe4Disaster.com
        </h1>

        <p class="p text-lg max-w-2xl mx-auto text-gray-200 drop-shadow">
            Share your worst culinary creations and browse recipes that probably shouldn’t exist.
        </p>

        <div class="mt-8 flex flex-wrap justify-center gap-4">

            @auth
                <a href="{{ route('recipes.create') }}" class="btn-primary">
                    Add Recipe
                </a>

                <a href="{{ route('recipes.browse') }}" class="btn-primary">
                    Browse Recipes
                </a>
            @endauth

            @guest
                <p class="text-white/90 text-sm w-full text-center drop-shadow">
                    Create an account to start submitting your own disastrous recipes!
                </p>

                <a href="{{ route('register') }}" class="btn-primary">
                    Register Now
                </a>

                <a href="#" class="btn-primary">
                    Browse Recipes
                </a>
            @endguest

        </div>

    </div>
</section>


<div class="max-w-5xl mx-auto px-8">

    <!-- Featured Recipes -->
    <section class="mt-16">

        <h2 class="h2 mb-6">Featured Recipes</h2>

        @php
            $featured = $recipes->shuffle()->take(3);
        @endphp

        @if ($featured->count() > 0)
            <div class="grid md:grid-cols-3 gap-6">

                @foreach ($featured as $recipe)
                    <div class="recipe-card">

                        <h3 class="h2 font-semibold text-lg mb-2">
                            {{ $recipe->title }}
                        </h3>

                        <img src="{{ asset('storage/' . $recipe->image_path) }}"
                             class="rounded-disaster mb-3 w-full h-auto object-cover shadow-smoke">

                        <p class="p mb-3">
                            {{ Str::limit($recipe->description, 80) }}
                        </p>

                        <a href="{{ route('recipes.show', $recipe) }}" class="link">
                            View Recipe →
                        </a>

                    </div>
                @endforeach

            </div>

        @else
            <p class="p text-center">
                No recipes yet — be the first to create a disaster in the kitchen!
            </p>
        @endif

    </section>

</div>

</x-app-layout>
