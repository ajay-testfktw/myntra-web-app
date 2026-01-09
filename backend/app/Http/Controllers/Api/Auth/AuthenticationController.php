<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helper\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResponse;
use App\Services\UsermanagementService;

class AuthenticationController extends Controller
{
    public function __construct(protected UsermanagementService $service) {}

    public function registerUser(RegisterRequest $request)
    {
        $user = $this->service->register($request->validated());
        return ApiResponseHelper::success(new UserResponse($user), 'User registered successfully', 201);
    }
}
