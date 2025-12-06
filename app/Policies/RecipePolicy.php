<?php

namespace App\Policies;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RecipePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Allow any authenticated user to list recipes (adjust as needed)
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Recipe $recipe): bool
    {
        return $user->id === $recipe->user_id || $user->role === 'admin' || true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Recipe $recipe)
    {
        return $user->id === $recipe->user_id || $user->is_admin;
    }

    public function delete(User $user, Recipe $recipe)
    {
        return $user->id === $recipe->user_id || $user->is_admin;
    }
}
