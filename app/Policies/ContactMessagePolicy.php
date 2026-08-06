<?php

namespace App\Policies;

use App\Models\ContactMessage;
use App\Models\User;

class ContactMessagePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, ContactMessage $contactMessage): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, ContactMessage $contactMessage): bool
    {
        return true;
    }

    public function delete(User $user, ContactMessage $contactMessage): bool
    {
        return $user->role === 'admin';
    }

    public function deleteAny(User $user): bool
    {
        return $user->role === 'admin';
    }
}
