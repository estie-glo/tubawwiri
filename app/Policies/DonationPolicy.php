<?php

namespace App\Policies;

use App\Models\Donation;
use App\Models\User;

class DonationPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Donation $donation): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Donation $donation): bool
    {
        return true;
    }

    public function delete(User $user, Donation $donation): bool
    {
        return $user->role === 'admin';
    }

    public function deleteAny(User $user): bool
    {
        return $user->role === 'admin';
    }
}
