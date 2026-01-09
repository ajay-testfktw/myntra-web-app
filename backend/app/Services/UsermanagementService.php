<?php

namespace App\Services;

use App\Models\User;
use App\Repository\UsermanagementRepository;

class UsermanagementService
{
    protected $usermanagementRepository;
    public function __construct(UsermanagementRepository $usermanagementRepository)
    {
        $this->usermanagementRepository = $usermanagementRepository;
    }

    public function register(array $data): User
    {
        return $this->usermanagementRepository->register($data);
    }

    private function sendVerificationEmail(string $email): void {}
}
