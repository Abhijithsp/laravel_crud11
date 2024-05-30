<?php

namespace App\Policies;

use App\Models\Posts;
use App\Models\User;

class PostsPolicy
{
    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user, string $ability): bool|null
    {

        if ($user->role === "1") {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Posts $posts): bool
    {
        return true;
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
    public function update(User $user, Posts $posts): bool
    {
        return $user->id === $posts->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Posts $posts): bool
    {
        return $user->id === $posts->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Posts $posts): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Posts $posts): bool
    {
        //
    }
}
