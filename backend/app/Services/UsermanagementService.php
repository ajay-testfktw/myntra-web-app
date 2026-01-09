<?php

namespace App\Services;

use App\Helper\ApiResponseHelper;
use App\Models\User;
use App\Repository\UsermanagementRepository;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsermanagementService
{
    protected $usermanagementRepository;
    public function __construct(UsermanagementRepository $usermanagementRepository)
    {
        $this->usermanagementRepository = $usermanagementRepository;
    }

    public function register(array $data): User
    {
        try {
            $this->sendVerificationEmail($data['email']);
            $user = $this->usermanagementRepository->register($data);
            $user->access_token = $this->generateVerificationToken($user->email);
            return $user;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private function sendVerificationEmail(string $email): void {}

    private function generateVerificationToken(string $email): string
    {
        $token = JWTAuth::fromUser(User::where('email', $email)->first());
        return $token;
    }
}
