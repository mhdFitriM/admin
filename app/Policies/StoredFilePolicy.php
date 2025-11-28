<?php

namespace App\Policies;

use App\Models\StoredFile;
use App\Models\User;

class StoredFilePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, StoredFile $storedFile): bool
    {
        return $user->id === $storedFile->user_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, StoredFile $storedFile): bool
    {
        return $user->id === $storedFile->user_id;
    }

    public function delete(User $user, StoredFile $storedFile): bool
    {
        return $user->id === $storedFile->user_id;
    }

    public function restore(User $user, StoredFile $storedFile): bool
    {
        return $user->id === $storedFile->user_id;
    }

    public function forceDelete(User $user, StoredFile $storedFile): bool
    {
        return $user->id === $storedFile->user_id;
    }
}
