<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Modelo;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModeloPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function pass(User $user, Modelo $modelo){
        return $user->id == $modelo->user_id;
    }
}
