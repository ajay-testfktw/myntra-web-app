<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helper\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResponse;
use App\Services\UsermanagementService;
use Exception;

class AuthenticationController extends Controller
{
    public function __construct(protected UsermanagementService $service) {}

    public function registerUser(RegisterRequest $request)
    {
        try {
            $user = $this->service->register($request->validated());
            return ApiResponseHelper::success(new UserResponse($user), 'User registered successfully', 201);
        } catch (Exception $th) {
            return ApiResponseHelper::error($th->getMessage(), 500);
        }
    }
}
