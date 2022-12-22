<?php

namespace App\Policies;

use App\Models\Model;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class ModelPolicy
{
    use HandlesAuthorization;

    /**
     * @return bool
     */
    public function list(User $user) : bool
    {
        // TODO: Recherche des infos en base pour autorisations
        return true;
    }

    /**
     * @return bool
     */
    public function read(User $user, $model) : bool
    {
        // TODO: Recherche des infos en base pour autorisations
        return $model->id;
    }

    /**
     * @return bool
     */
    public function create(User $user) : bool
    {
        // TODO: Recherche des infos en base pour autorisations
        return true;
    }

    /**
     * @return bool
     */
    public function update(User $user, $model) : bool
    {
        // TODO: Recherche des infos en base pour autorisations
        return $model->id;
    }

    /**
     * @return bool
     */
    public function delete(User $user, $model) : bool
    {
        // TODO: Recherche des infos en base pour autorisations
        return $model->id;
    }
}
