<?php

namespace Mejenguitas\Policies;

use Mejenguitas\User;
use Mejenguitas\Message;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the message.
     *
     * @param  \Mejenguitas\User  $user
     * @param  \Mejenguitas\Message  $message
     * @return mixed
     */
    public function view(User $user, Message $message)
    {

    }

    public function show(User $user, Message $message)
    {
        return $user->email===$message->email_receive;
    }
    /**
     * Determine whether the user can create messages.
     *
     * @param  \Mejenguitas\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the message.
     *
     * @param  \Mejenguitas\User  $user
     * @param  \Mejenguitas\Message  $message
     * @return mixed
     */
    public function update(User $user, Message $message)
    {
        //
    }

    /**
     * Determine whether the user can delete the message.
     *
     * @param  \Mejenguitas\User  $user
     * @param  \Mejenguitas\Message  $message
     * @return mixed
     */
    public function delete(User $user, Message $message)
    {
        //
    }
}
