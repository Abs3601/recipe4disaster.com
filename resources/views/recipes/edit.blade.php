<x-app-layout>

<div class="max-w-3xl mx-auto py-10">

    <h1 class="h1 mb-6">Edit Recipe</h1>

    <form action="{{ route('recipes.update', $recipe) }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="space-y-6">

        @csrf
        @method('PUT')

        <div>
            <label class="label">Title</label>
            <input type="text" name="title" value="{{ $recipe->title }}" class="input" required>
        </div>

        <div>
            <label class="label">Description</label>
            <textarea name="description" rows="3" class="textarea" required>{{ $recipe->description }}</textarea>
        </div>

        <div>
            <label class="label">Ingredients</label>
            <textarea name="ingredients" rows="4" class="textarea" required>{{ $recipe->ingredients }}</textarea>
        </div>

        <div>
            <label class="label">Steps</label>
            <textarea name="steps" rows="5" class="textarea" required>{{ $recipe->steps }}</textarea>
        </div>

        <div>
            <label class="label">Replace Image (optional)</label>
            <input type="file" name="image" class="input">
        </div>

        <button class="btn-primary">
            Save Changes
        </button>

    </form>

</div>

</x-app-layout>
