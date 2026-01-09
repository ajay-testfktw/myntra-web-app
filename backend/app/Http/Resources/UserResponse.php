<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResponse extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ?? null,
            'email' => $this->email ?? null,
            'access_token' => $this->access_token ?? null,
            'refresh_token' => $this->refresh_token ?? null,
        ];
    }
}
