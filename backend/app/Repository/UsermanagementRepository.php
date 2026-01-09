<?php

namespace App\Repository;

use App\Interface\UsermanagementInterface;
use App\Models\User;

class UsermanagementRepository implements UsermanagementInterface
{
    public function register(array $data): User
    {
        return User::create($data);
    }
}
