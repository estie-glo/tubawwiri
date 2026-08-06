<?php

namespace App\Policies;

use App\Models\PartnerRequest;
use App\Models\User;

class PartnerRequestPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, PartnerRequest $partnerRequest): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, PartnerRequest $partnerRequest): bool
    {
        return true;
    }

    public function delete(User $user, PartnerRequest $partnerRequest): bool
    {
        return $user->role === 'admin';
    }

    public function deleteAny(User $user): bool
    {
        return $user->role === 'admin';
    }
}
