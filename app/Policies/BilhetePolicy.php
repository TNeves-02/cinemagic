<?php

namespace App\Policies;

use App\Models\Bilhete;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BilhetePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return ($user->tipo == 'A' || $user->tipo == 'F');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bilhete  $bilhete
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Bilhete $bilhete)
    {
        if($user->id == $bilhete->cliente_id)
        {
            return true
        }
        return ($user->tipo == 'A' || $user->tipo == 'F');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->tipo == 'A';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bilhete  $bilhete
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Bilhete $bilhete)
    {
        return ($user->tipo == 'A' || $user->tipo == 'F');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bilhete  $bilhete
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Bilhete $bilhete)
    {
        return $user->tipo == 'A';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bilhete  $bilhete
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Bilhete $bilhete)
    {
        return $user->tipo == 'A';
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bilhete  $bilhete
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Bilhete $bilhete)
    {
        return $user->tipo == 'A';
    }
}
