<x-app-layout>

<div class="max-w-3xl mx-auto py-10">

    <h1 class="h1 mb-6">{{ $recipe->title }}</h1>

    <img src="{{ asset('storage/' . $recipe->image_path) }}"
         class="w-full max-w-2xl rounded-disaster shadow-smoke mb-6 transition-disaster">

    <div class="space-y-8">

        <div>
            <h2 class="h2 mb-2">Description</h2>
            <p class="p">{{ $recipe->description }}</p>
        </div>

        <div>
            <h2 class="h2 mb-2">Ingredients</h2>
            <pre class="pre-box">{{ $recipe->ingredients }}</pre>
        </div>

        <div>
            <h2 class="h2 mb-2">Steps</h2>
            <pre class="pre-box">{{ $recipe->steps }}</pre>
        </div>

    </div>

    @can('update', $recipe)
        <div class="flex gap-4 mt-10">
            <a href="{{ route('recipes.edit', $recipe) }}" class="btn-primary">
                Edit
            </a>

            <form action="{{ route('recipes.destroy', $recipe) }}" method="POST"
                  onsubmit="return confirm('Delete recipe? This might be your worst one yet.');">

                @csrf
                @method('DELETE')

                <button class="btn-danger">
                    Delete
                </button>
            </form>
        </div>
    @endcan

</div>

</x-app-layout>
