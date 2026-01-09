<?php

namespace App\Services;

use App\Helper\ApiResponseHelper;
use App\Models\User;
use App\Repository\UsermanagementRepository;
use Exception;

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
            return $this->usermanagementRepository->register($data);
        } catch (Exception $th) {
            throw new Exception($th->getMessage());
        }
    }
}
