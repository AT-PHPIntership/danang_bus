<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param User $user of user
     *
     * @return void
     */
    public function creating(User $user)
    {
        $user->password = bcrypt($user->password);
    }

     /**
     * Listen to the User created event.
     *
     * @param User $user of user
      *
     * @return void
     */
    public function updating(User $user)
    {
        if (\Hash::needsRehash($user->password)) {
            $user->password = bcrypt($user->password);
        }
    }
}
