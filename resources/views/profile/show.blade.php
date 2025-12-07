<x-app-layout>

<div class="max-w-5xl mx-auto px-8 py-10">
    <h1 class="h1 mb-6">Your Profile</h1>

    <!-- Tabs -->
    <div class="flex space-x-4 border-b border-gray-300 dark:border-ui-darkCard mb-8">

        <button class="profile-tab active-tab" data-tab="overview">
            Overview
        </button>

        <button class="profile-tab" data-tab="settings">
            Account Settings
        </button>

        <button class="profile-tab" data-tab="recipes">
            Your Recipes
        </button>

    </div>

    <div id="tab-overview" class="profile-tab-content">
        <div class="card p-6">
            <h2 class="h2 mb-4">Basic Info</h2>

            <p class="p"><strong>Name:</strong> {{ $user->name }}</p>
            <p class="p"><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        <div class="card p-6 mt-6">
            <h2 class="h2 mb-4">Statistics</h2>
            <p class="p"><strong>Total Recipes:</strong> {{ $recipes->count() }}</p>
        </div>

        <div class="card p-6 mt-6">
            <h2 class="h2 mb-4"> Membership</h2>
            <p class="p"><strong>Member Since:</strong> {{ $user->created_at->isoFormat('Do, MMMM, YYYY') }}</p>
        </div>

        <div class="card p-6 mt-6">
        <p class="p">
        <strong>Account Type:</strong>
        @if($user->is_admin)
            <span class="text-ui-primary font-semibold">Administrator</span>
        @else
            <span class="text-ui-muted">Standard User</span>
        @endif
        </p>
        </div>
    </div>



    <div id="tab-settings" class="profile-tab-content hidden">

        <div class="card p-6 space-y-10">

            <div>
                <h2 class="h2 mb-4">Update Profile Information</h2>
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="pt-6 border-t border-gray-200 dark:border-ui-darkCard">
                <h2 class="h2 mb-4">Change Password</h2>
                @include('profile.partials.update-password-form')
            </div>

            <div class="pt-6 border-t border-gray-200 dark:border-ui-darkCard">
                <h2 class="h2 mb-4 text-red-600">Danger Zone</h2>
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>


    <div id="tab-recipes" class="profile-tab-content hidden">

        <h2 class="h2 mb-6">Your Recipes</h2>

        @if ($recipes->count() === 0)
            <p class="p text-center my-6">You haven't added any recipes yet.</p>
        @else
            <div class="grid gap-6 md:grid-cols-2">
                @foreach ($recipes as $recipe)
                    <div class="recipe-card">
                        <h3 class="h2 mb-2">{{ $recipe->title }}</h3>

                        <img src="{{ asset('storage/' . $recipe->image_path) }}"
                             class="w-full rounded-brand mb-3 shadow-soft">

                        <p class="p mb-3">
                            {{ Str::limit($recipe->description, 80) }}
                        </p>

                        <div class="flex justify-between items-center">
                            <a href="{{ route('recipes.show', $recipe) }}" class="link">View</a>

                            <div class="flex space-x-4">
                                <a href="{{ route('recipes.edit', $recipe) }}" class="btn-primary px-3 py-1">
                                    Edit
                                </a>

                                <form action="{{ route('recipes.destroy', $recipe) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this recipe?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-danger px-3 py-1">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>

</div>



</x-app-layout>
