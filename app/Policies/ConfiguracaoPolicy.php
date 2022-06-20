<?php

namespace App\Policies;

use App\Models\Configuracao;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConfiguracaoPolicy
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
        if($user->tipo == 'A')
        {
            return true;
        } 
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Configuracao  $configuracao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Configuracao $configuracao)
    {
        if($user->tipo == 'A')
        {
            return true;
        } 
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Configuracao  $configuracao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Configuracao $configuracao)
    {
        if($user->tipo == 'A')
        {
            return true;
        } 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Configuracao  $configuracao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Configuracao $configuracao)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Configuracao  $configuracao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Configuracao $configuracao)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Configuracao  $configuracao
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Configuracao $configuracao)
    {
     
            return false;
       
    }
}
