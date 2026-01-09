<?php

namespace App\Interface;

use App\Models\User;

interface UsermanagementInterface
{
    public function register(array $data): User;
}
