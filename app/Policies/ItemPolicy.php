<?php

namespace App\Policies;

use App\Items;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the items.
     *
     * @param  \App\User  $user
     * @param  \App\Items  $items
     * @return mixed
     */
    public function edit(User $user, Items $items)
    {
    
        if ($user->is_admin == 1) {
            return true;
        } else {
            return $user->id = $items->users_id;
        }
    }

    /**
     * Determine whether the user can create items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the items.
     *
     * @param  \App\User  $user
     * @param  \App\Items  $items
     * @return mixed
     */
    public function update(User $user, Items $items)
    {

    }

    /**
     * Determine whether the user can delete the items.
     *
     * @param  \App\User  $user
     * @param  \App\Items  $items
     * @return mixed
     */
    public function delete(User $user, Items $items)
    {
        //
    }

}
