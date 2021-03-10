<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Marca;
use Illuminate\Auth\Access\HandlesAuthorization;

class MarcaPolicy
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
    public function pass(User $user, Marca $marca){
        //dd($user,$marca);
        return $user->id == $marca->user_id;
    }
}
