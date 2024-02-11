<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class UserResource extends JsonResource
{
    public $preserveKeys = true;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'user_id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'token' => $this->createToken("Token")->plainTextToken,
            'roles' => $this->roles,
            //'permissions' => $this->permissions
            'links' => [
                'self' => Request::fullUrl(),
            ],
        ];
    }
}
