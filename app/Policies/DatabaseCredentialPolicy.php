<?php

namespace App\Policies;

use App\Models\DatabaseCredential;
use App\Models\User;

class DatabaseCredentialPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, DatabaseCredential $databaseCredential): bool
    {
        return $user->id === $databaseCredential->user_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, DatabaseCredential $databaseCredential): bool
    {
        return $user->id === $databaseCredential->user_id;
    }

    public function delete(User $user, DatabaseCredential $databaseCredential): bool
    {
        return $user->id === $databaseCredential->user_id;
    }

    public function restore(User $user, DatabaseCredential $databaseCredential): bool
    {
        return $user->id === $databaseCredential->user_id;
    }

    public function forceDelete(User $user, DatabaseCredential $databaseCredential): bool
    {
        return $user->id === $databaseCredential->user_id;
    }
}
