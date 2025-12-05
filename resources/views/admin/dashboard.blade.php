<x-app-layout>

<div class="max-w-5xl mx-auto px-8 py-10">

    <h1 class="h1 mb-6">Admin Dashboard</h1>

    <p class="p mb-6">
        Welcome, admin. Use the panel below to manage site content.
    </p>

    <a href="{{ route('admin.recipes') }}" class="btn-primary">Manage All Recipes</a>

</div>

</x-app-layout>
