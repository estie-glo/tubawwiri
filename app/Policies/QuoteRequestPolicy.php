<?php

namespace App\Policies;

use App\Models\QuoteRequest;
use App\Models\User;

class QuoteRequestPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, QuoteRequest $quoteRequest): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, QuoteRequest $quoteRequest): bool
    {
        return true;
    }

    public function delete(User $user, QuoteRequest $quoteRequest): bool
    {
        return $user->role === 'admin';
    }

    public function deleteAny(User $user): bool
    {
        return $user->role === 'admin';
    }
}
