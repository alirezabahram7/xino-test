<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function get(int $userId): User;

    public function update(array $data, User $user);

}
