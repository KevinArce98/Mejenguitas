<?php

namespace Mejenguitas\Policies;

use Mejenguitas\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

     public function indexForUser(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }

    public function create(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }
    public function store(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }
}
