<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function get(int $userId): User
    {
        return User::find($userId);
    }

    public function update(array $data, User $user): User
    {
        $user->update($data);

        return $user;
    }
}
