<x-app-layout>

<div class="max-w-3xl mx-auto py-10">

    <h1 class="h1 mb-6">Create a Bad Recipe</h1>

    <form action="{{ route('recipes.store') }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="space-y-6">

        @csrf

        <div>
            <label class="label">Title</label>
            <input type="text" name="title" class="input" required>
        </div>

        <div>
            <label class="label">Description</label>
            <textarea name="description" rows="3" class="textarea" required></textarea>
        </div>

        <div>
            <label class="label">Ingredients</label>
            <textarea name="ingredients" rows="4" class="textarea" required></textarea>
        </div>

        <div>
            <label class="label">Steps</label>
            <textarea name="steps" rows="5" class="textarea" required></textarea>
        </div>

        <div>
            <label class="label">Recipe Image</label>
            <input type="file" name="image" accept="image/*" class="input" required>
        </div>

        <button class="btn-primary">
            Submit Recipe
        </button>

    </form>

</div>

</x-app-layout>
