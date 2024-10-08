<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacante;
use Illuminate\Auth\Access\Response;

class VacantePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return $user->role === 1;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vacante $vacante)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
        return $user->role === 1;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vacante $vacante)
    {
        //Para que el usuario pueda editar una vacante siempre y cuando sea el mismo id
        return $user->id === $vacante->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vacante $vacante)
    {
        //
        return $user->id === $vacante->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vacante $vacante)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vacante $vacante)
    {
        //
    }
}
