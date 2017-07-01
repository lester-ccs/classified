<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Listing;

class ListingPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }

    public function update(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }

    public function destroy(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }
}
