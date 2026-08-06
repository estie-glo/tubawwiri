<?php

namespace App\Policies;

use App\Models\JoinRequest;
use App\Models\User;

class JoinRequestPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, JoinRequest $joinRequest): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, JoinRequest $joinRequest): bool
    {
        return true;
    }

    public function delete(User $user, JoinRequest $joinRequest): bool
    {
        return $user->role === 'admin';
    }

    public function deleteAny(User $user): bool
    {
        return $user->role === 'admin';
    }
}
