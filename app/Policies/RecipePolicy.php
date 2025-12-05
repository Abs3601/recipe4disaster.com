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
        // Allow viewing to owner or admin, or public visibility if your model supports it.
        // If your Recipe model has an `is_public` attribute uncomment the check below.
        // return ($recipe->is_public ?? false) || $user->id === $recipe->user_id || $user->role === 'admin';
        return $user->id === $recipe->user_id || $user->role === 'admin' || true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Allow any authenticated user to create (adjust if you require a role)
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

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Recipe $recipe): bool
    {
        return $user->id === $recipe->user_id || $user->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Recipe $recipe): bool
    {
        return $user->role === 'admin';
    }
}
